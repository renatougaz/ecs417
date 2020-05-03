#Password geenerator 
import random
import string
while True:
    passlen = random.randint(4,10)#Sets the inital lenght of the password 
    password = str()
    chartypes = ["upp","low","num","sym"]#All the possible types of characters
    for looptimes in range(passlen):
        chartype = random.choice(chartypes)
        if chartype == "upp":
            password +=random.choice(string.ascii_uppercase)
        elif chartype == "low":
            password +=random.choice(string.ascii_lowercase)
        elif chartype == "num":
            password +=random.choice(string.digits)
        elif chartype == "sym":
            password +=random.choice(string.punctuation)
    securechars = random.choice(string.ascii_uppercase)+random.choice(string.ascii_lowercase)+random.choice(string.digits)+random.choice(string.punctuation)# This will make sure the password will have one of each type of character
    password += securechars
    passlist = list(password)
    random.shuffle(passlist)# Makes sure securechars are not always together
    password ="".join(passlist)
    print("The password is",password)
    print("Do you want another password?")
    while True:
        other=input().lower()
        if other not in ["yes","no"]:#Will make sure the user enters only yes or no
            print("Type yes or no please")
            continue
        else:
            break
    if other == "no":
        break

