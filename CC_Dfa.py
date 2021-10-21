
# File Reading
list = []
f = open("program.txt", "r")
while True:
    c = f.read(1)
    if not c:
        break
    else:
        list.append(c)


def key_dfa(state, character):
    # int
    if state == "q0" and character == "i":
        return "q1"
    elif state == "q1" and character == "n":
        return "q2"
    elif state == "q2" and character == "t":
        return "F"
    # if
    elif state == "q1" and character == "f":
        return "F"
    # float
    elif state == "q0" and character == "f":
        return "q3"
    elif state == "q3" and character == "l":
        return "q4"
    elif state == "q4" and character == "o":
        return "q5"
    elif state == "q5" and character == "a":
        return "q2"
    # else
    elif state == "q0" and character == "e":
        return "q6"
    elif state == "q6" and character == "l":
        return "q7"
    elif state == "q7" and character == "s":
        return "q8"
    elif state == "q8" and character == "e":
        return "F"
    # for
    elif state == "q3" and character == "o":
        return "q9"
    elif state == "q9" and character == "r":
        return "F"
    # while
    elif state == "q0" and character == "w":
        return "q10"
    elif state == "q10" and character == "h":
        return "q11"
    elif state == "q11" and character == "i":
        return "q12"
    elif state == "q12" and character == "l":
        return "q8"
    # string
    elif state == "q0" and character == "s":
        return "q13"
    elif state == "q13" and character == "t":
        return "q14"
    elif state == "q14" and character == "r":
        return "q11"
    elif state == "q12" and character == "n":
        return "q15"
    elif state == "q15" and character == "g":
        return "F"
    else:
        return "D"


def keyword_check(i):
    next_char = 0
    state = "q0"
    character = i[next_char]
    while next_char != len(i):
        state = key_dfa(state, character)
        next_char += 1
        if state == "F":
            key.append(i)
            return True
        elif state == "D":
            return False
        character = i[next_char]


def op_dfa(state, character):
    if state == "q0" and (character == "="or character == "=="or character == "+"or character == "++"or character == "-"or character == "--"or character == "*"or character == "/"or character == "%"or character == ";"or character == "}"or character == "{"or character == ")"or character == "("or character == "!"or character == "|"or character == "&"or character == "."or character == "<"or character == "<="or character == ">"or character == ">="):
        return "F"
    else:
        return "D"


def operator_check(i):
    next_char = 0
    state = "q0"
    character = i[next_char]
    while next_char != len(i):
        state = op_dfa(state, character)
        next_char += 1
        if state == "F":
            op.append(i)
            return True
        elif state == "D":
            return False
        character = i[next_char]


def id_dfa(state, character):
    # Possible Identifier
    if state == "q0" and (character == "_" or character == "a"or character == "b"or character == "c"or character == "d"or character == "e"or character == "f"or character == "g"or character == "h"or character == "i"or character == "j"or character == "k"or character == "l"or character == "m"or character == "n"or character == "o"or character == "p"or character == "q"or character == "r"or character == "s"or character == "t"or character == "u"or character == "v"or character == "w"or character == "x"or character == "y"or character == "z"or character == "A"or character == "B"or character == "C"or character == "D"or character == "E"or character == "F"or character == "G"or character == "H"or character == "I"or character == "J"or character == "K"or character == "L"or character == "M"or character == "N"or character == "O"or character == "P"or character == "Q"or character == "R"or character == "S"or character == "T"or character == "U"or character == "V"or character == "W"or character == "X"or character == "Y"or character == "Z"):
        return "F"
    else:
        return "D"


def check_variable(i):
    next_char = 0
    state = "q0"
    character = i[next_char]
    while next_char != len(i):
        state = id_dfa(state, character)
        next_char += 1
        if state == "F":
            valid_identifier.append(i)
            return True
        elif state == "D":
            return False
        character = i[next_char]


# Defininh The List
key = []
op = []
temp = []
valid_identifier = []
invalid_identifier = []

# traverse till end of file
for k in range(len(list)):
    if (list[k] == " " or list[k] == "," or list[k] == "\n"):
        combine_temp = "".join(temp)
        temp.clear()
        if len(combine_temp) > 0:
            check = keyword_check(combine_temp)
            if check == False:
                check = operator_check(combine_temp)
                if check == False:
                    check = check_variable(combine_temp)
                    if check == False:
                        invalid_identifier.append(combine_temp)
    else:
        temp.append(list[k])

print("\t\t\t\t\t ~~~~ Table ~~~~\n")
print("\t\t Keywords :  ", key, '\n',
    "\t\t Operators :  ", op, '\n',
    "\t\t Identifier :  ", valid_identifier, '\n',
    "\t\t Invalid :  ", invalid_identifier, '\n')
