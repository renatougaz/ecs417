/*Author Renato Ugaz Huaringa
Alien pet program, user takes cares of pets until one of their needs is not properly fullfilled or user.
User picks an amount of pets to take care of at the beginning of the game.
Then, names for each pet are chosen and random stas are given for each pet.
The game then is based on a series of rounds in which all pets are taken care of in each round.
The game can be exited after a set amount of rounds and saved so it can be continued later on.
*/
import java.io.*;
import java.util.*;


class mini {
	public static void main (String[] p)throws IOException{
		int numberOfPets = welcomeMessage();//Gets the number of pets used, if user types continue -1 is given 
		int round = 1;
		alien[] pet;
		if (numberOfPets == -1){
			round =roundReader();
			pet = alienReader();
			numberOfPets = pet.length;
		}
		else {
			pet = newAliens(numberOfPets);
			
		}
		rounds(pet,numberOfPets,round);
	}


	public static int welcomeMessage() {//Greets the user and gets the amount of pets making sure the integers are in range. Also returns -1 if continue is entered
		print("Welcome to alien pets!\nHow many pets would you like to take care of?");
		int numberOfPets;
		String choice;
		while (true){
			choice = input().toUpperCase();
			if (choice.equals("CONTINUE")){
				return -1;
			}
			numberOfPets = Integer.parseInt(choice);
			if (numberOfPets > 5){
				print("The maximun number of pets is 5\nPlease enter another number");
				continue;
	 		}
			else if (numberOfPets <= 0){
				print("You must at least take care of one pet\nTry again!");
				continue;
			}
			else {
				print("Great!\n" + numberOfPets + " pets it is!");
				break;
			}
		}
		return numberOfPets;
	}

	public static alien[] newAliens (int numberOfPets){  // Gets the pets for a new game, getting their names and setting random stats
		alien[] pet = new alien[numberOfPets];
		nameSetter(numberOfPets, pet);
		intialHungerSetter(numberOfPets, pet);
		intialThirstSetter(numberOfPets, pet);
		intialFatigueSetter(numberOfPets, pet);
		intialAngerSetter(numberOfPets, pet);
		nameDisplayer(numberOfPets, pet);
		return pet;
	}

	public static void nameDisplayer(final int numberOfPets,alien pet[]){//Prints out all the names of the pets before starting the game
		if (numberOfPets == 1){
			print(("Say hi to your pet"+nameGetter(pet[0])));
		}
		else {
	 		print("Say hello to your pets:");
			for (int i = 0; i < numberOfPets; i++){
				print(nameGetter(pet[i]));
			}
		}
		print("");
	}


	public static alien[] nameSetter(final int numberOfPets, alien[] pet) {//Fills the empty pet array with pets and sets their names to user input
		for (int i = 0; i < numberOfPets; i++){
			alien tempAlien = new alien();
			print("What will the name of alien #" + (i+1) +" be?");
			pet[i]=alienNameS(tempAlien,input());
		}
		return pet;
	}

	public static alien[] intialHungerSetter(final int numberOfPets,alien pet[]){//Intial setters for the records (Sets ALL pets)
		for (int i = 0; i < numberOfPets; i++ ){
			alienHungerS(pet[i],randomStatGetter());
		}
		return pet;
	}
	public static alien[] intialThirstSetter (final int numberOfPets,alien pet[]){
		for (int i = 0; i <numberOfPets; i++){
			alienThirstS(pet[i],randomStatGetter());
		}
		return pet;
	}

	public static alien[] intialFatigueSetter (final int numberOfPets,alien pet[]){
		for (int i = 0; i<numberOfPets; i++){
			alienFatigueS(pet[i],randomStatGetter());
		}
		return pet;
	}
	public static alien[] intialAngerSetter( final int numberOfPets,alien pet[]){ 
		for (int i = 0; i < numberOfPets; i++){
			angerSetter(pet[i]);
		}
		return pet;
	}


	public static void angerMessage(alien pet){//prints a message to warn the user about the pet's anger before the pet is taken care of in a round
		String name = nameGetter(pet);
		int anger = angerGetter(pet);
		if (anger == 3){
			print(name + " is looking really happy! (Anger level = 0)");
		}
		else if (anger == 2){
			print(name +" is looking alright (Anger level = 1)");
		}
		else if (anger == 1){
			print(name +" is looking a bit angry (Anger level = 2)");
		}
		else {
			print(name +" is looking real MAD (Anger level = MAX)");
		}
	}
	public static int randomStatGetter(){// As hunger, thirst and fatigue are generated from a random number they can be obtained through this
		int number = randomint(7);
		return number;
	}


	public static alien angerSetter(alien pet){ //gets anger by adding hunger,thirst and fatigue up and diving them into their maximum amount
		pet.anger = (hungerGetter(pet)+ thirstGetter(pet)+ fatigueGetter(pet))/6;
		return pet;
	}

	public static int randomint(int n){// returns a random integer
		Random rand = new Random();
		int number = rand.nextInt(n);
		return number;
	}

	public static void print(String text){// function for quick printing
		System.out.println(text);
	}

	public static String input(){//function for quick String scanning
		Scanner scanner = new Scanner(System.in);
		String text = scanner.nextLine();
		return text;
	}

	public static alien alienNameS(alien pet, String name){//different setters for records(for changes done during each round or when reading a file)
		pet.name = name;
		return pet;
	}
	public static alien alienHungerS(alien pet,int hunger) {
		pet.hunger= hunger;
		return pet;
	}

	public static alien alienThirstS(alien pet,int thirst) {
		pet.thirst = thirst;
		return pet;
	}

	public static alien alienFatigueS(alien pet,int fatigue) {
		pet.fatigue = fatigue;
		return pet;
	}

	public static String nameGetter(alien pet){//getters for the pet record information
		return pet.name;
	}

	public static int hungerGetter(alien pet){
		return pet.hunger;
	}

	public static int angerGetter(alien pet){
		return pet.anger;
	}

	public static int thirstGetter(alien pet){
		return pet.thirst;
	}

	public static int fatigueGetter( alien pet){
		return pet.fatigue;
	}

	public static void status(int hunger, int thirst, int fatigue,String name){//method that prints the status of a pet during the game
		print(name+"'s status:");
		print("hunger = "+hunger+"\nthirst = "+thirst+"\nfatigue = "+fatigue+"\n");
	}

	public static boolean yesOrNo(){//for validation on yes or no questions
		while (true){
			String choice = input();
			choice = choice.toUpperCase();
			if (choice.equals("YES")){
				return true;
			}
			else if (choice.equals("NO")){
				return false;
			}
			else {
				print("Please enter yes or no");
				continue;
			}
		}
	}
	public static alien[] bubbleSort (alien[] pet,final int numberOfPets){//Bubble sort depeding on the pets anger
		alien tempAlien = new alien();
		for (int i = 0 ; i < numberOfPets; i++){
			for(int j = 1; j< (numberOfPets-i); j++){
				if(angerGetter(pet[j-1]) > angerGetter(pet[j])){
					tempAlien = pet[j-1];
					pet[j-1] = pet[j];
					pet[j] = tempAlien;
				}
			}
		}
		return pet;
	}

	public static void rounds(alien pet[], final int numberOfPets,int round)throws IOException{// Main body of the game
		String action;
		int hunger;
		int thirst;
		int fatigue;
		boolean alive = true;
		int badstatus;
		final int finalround = 5;
		while (alive){//Main loop of the game, each loop cycle represents a round
			print("Round: " + round);

			//asks if the user wants the order of the pets to be in terms of anger
			if (numberOfPets > 1){
				print("Do you want to take care of the pets in anger order?\n(yes or no)");
				if (yesOrNo()){
					pet = bubbleSort(pet,numberOfPets);
				}
			}	
			for (int i = 0; i < numberOfPets;i++){

				//Sets the status of the current pet into varibles so they can be modified easily
				hunger = hungerGetter(pet[i]);
				thirst = thirstGetter(pet[i]);
				fatigue = fatigueGetter(pet[i]);

				//bad status gets a random number to substract from the current stats
				badstatus = randomint(3);

				//prints out all the messges about the pets status
				status(hunger, thirst, fatigue,nameGetter(pet[i]));
				angerMessage(pet[i]);
				action = gameInput(round,finalround);

				//depending on the random number one stat is lowered
				if (badstatus == 0){
					hunger = hunger- 1;
				}
				else if (badstatus == 1){
					thirst = thirst- 1;
				}
				else {
					fatigue = fatigue- 1;
				}

				//depeding on the action chosen the program will add to one stat
				if (action.equals("F")){
					hunger = hunger + (randomint(2)+1);
					if (hunger >= 6){
						hunger = 6;
						print("The maximum hunger level is 6");
					}
				}
				else if (action.equals("W")){
					thirst = thirst + (randomint(2)+1);
					if (thirst >= 6){
						thirst = 6;
						print("The maximum thirst level is 6");
					}
				}
				else if (action.equals("S")){
					fatigue = fatigue + (randomint(2)+1);
					if (fatigue >= 6){
						fatigue = 6;
						print("The maximum fatigue level is 6");
					}

				}

				//when is is chosen the game saves the stats and round in a file and closes
				else if (action.equals("E")){ 
					gameSaver(pet, numberOfPets, round);
					System.exit(0);
				}

				//Stops the game if any of these conditions are met (losing)
				if ((hunger == 0 && thirst == 0 && fatigue == 0) || (hunger <0) || (thirst <0)||(fatigue<0)){
					print("Well,"+nameGetter(pet[i])+" isn't with us anymore...\nGAME OVER");
					alive = false;
					break;
				}

				//sets the changed stats in records
				alienFatigueS(pet[i],fatigue);
				alienHungerS(pet[i], hunger);
				alienThirstS(pet[i],thirst);
				angerSetter(pet[i]);
			}
			round = round + 1;
		}
		//message printed when the game ends
		print("You made it until round " + (round-1)+"!");
		System.exit(0);
	}

	public static String gameInput(int round, final int finalround){//acts as validation for the user actions
		String action;
		while (true) {
			print("What will you do now?\n\nF - Feed\nW - Give water\nS - Sing\n");
			if (round >= finalround){
				print("E - Exit and save");
			}
			action = input();
			action = action.toUpperCase();

			//Makes sure exit is only chosen after a set amount of rounds
			if (action.equals("F") || action.equals("W")||action.equals("S")||(action.equals("E") && round >= finalround)){
				break;
			}
			else {
				print("Please enter a valid option");
			}
		}
		return action;
	}
	public static void gameSaver(alien[] pet, int numberOfPets,int round)throws IOException{//saves the number of pets, the stats and the current round
		PrintWriter outputStream = new PrintWriter(new FileWriter("AlienFile.txt"));
		outputStream.println(round);
		outputStream.println(numberOfPets);
		for (int i = 0; i<numberOfPets;i++){
			outputStream.println(nameGetter(pet[i])+" "+hungerGetter(pet[i])+" "+thirstGetter(pet[i])+" "+fatigueGetter(pet[i]));
		}
		outputStream.println(round);
		outputStream.close();
		print("Game saved until round "+ round);
		print("Type continue at the beginning to continue the game");
	}
	public static alien[] alienReader()throws IOException{ //reads the stats saved in a file and creates an array of records from them
		BufferedReader inputStream = new BufferedReader(new FileReader("AlienFile.txt"));
		inputStream.readLine();//skips a line as this one stores the rounds
		int numberOfPets = Integer.parseInt(inputStream.readLine());
		alien[] pet = new alien[numberOfPets];
		String[] status;
		String line;
		for (int i = 0; i < numberOfPets;i++){
			pet[i] = new alien();
			line = inputStream.readLine();
			status = line.split(" ");
			alienNameS(pet[i],status[0]);
			alienHungerS(pet[i],Integer.parseInt(status[1]));
			alienThirstS(pet[i],Integer.parseInt(status[2]));
			alienFatigueS(pet[i],Integer.parseInt(status[3]));
			angerSetter(pet[i]);
		}
		inputStream.close();
		return pet;
	}
	public static int roundReader() throws IOException { //reads the first line of the text file to get the rounds
		BufferedReader inputStream = new BufferedReader(new FileReader("AlienFile.txt"));
		int round = Integer.parseInt(inputStream.readLine());
		inputStream.close();
		return round;
	}
}
class alien {//class that stores records for the pet
	String name="";
	int hunger;
	int thirst;
	int fatigue;
	int anger;
}