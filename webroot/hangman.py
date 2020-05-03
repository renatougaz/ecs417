#Hangman game
import random
import string
def game():
    wordlist =["bird","elephant","rhinoceros","capybara","keyboard","computing","persistence","hangman","gaming","coding","spanish","egg hunt"]
    word = random.choice(wordlist)
    wlen = len(word)
    print("The word is", len(word),"characters long\nYou will start with 5 lives, every time you fail you will lose 1\nGood luck!")
    word = list(word)
    lives = 5
    dword = list()#The string that will be shown in every attempt of the game
    for letter in word:#This for loop makes the dashes not to appear in dword when theres is a space
        if letter == " ":
            dword.append(" ")
        else:
            dword.append("-")
    dword = "".join(dword)
    while lives > 0:
        correctguesses = list()
        print("\n"+dword)
        print("Make a guess:")
        while True:#Makes sure the guess is only processed when necessary
            guess = input().lower()
            if word == list(dword):
                break
            if len(guess) != 1:
                print("Please enter one letter")
                continue
            elif guess not in string.ascii_letters:
                print("please enter a letter")
                continue
            else:
                break
        if guess not in word:
            lives -= 1
            if lives == 0:
                break
            print("oops,",guess,"is not in the word\nRemaining lives:",lives,"")
        else:
            for i in range(wlen):#Gets the position of the letter that was guessed
                if guess == word[i]:
                    correctguesses.append(i)
            dword = list(dword)
            for i in correctguesses:
                dword[i] = word[i]
            if len(correctguesses) == 1:
                print("\nWell done! There is one",guess.upper(),"in the word")
            else:
                print("\nWell done! There are",len(correctguesses),guess.upper()+"s in the word")
        if word == dword:
            break
        dword = "".join(dword)
    if lives == 0:
        print("Bummer!, you ran out of lives :(\nTry again!")
        word = "".join(word)
        print("The word was:",word)
    else:
        print("\nGreat! You guessed the word!\nBet you can do another one ;)")
other= "yes"
while other == "yes":
    game()
    print("Do you wanna keep playing? Type yes or no")
    while True:
        other = input().lower()
        if other not in ["yes","no"]:#Makes sure it can only take yes or no
            print("Hey! Enter yes or no, you silly billy!")
            continue
        elif other == "no":
            print("See you!")
            input()
            break
        elif other =="yes":
            break
