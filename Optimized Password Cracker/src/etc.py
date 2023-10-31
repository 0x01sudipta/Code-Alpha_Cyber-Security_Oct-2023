import datetime
from parsing import args
from etc import *

def summary(): # prints summary of attack once finished, or if stopped
    print(f"+-[{current()}:KLYDA STRIKES]".ljust(args.border,"-") + "+" + "\n" + "|".ljust(args.border," ") + "|")
    for i in strikecombos:
        print(("|" + i).ljust(args.border+10," ") + "|")
    print(f"+-[{current()}:STAT SUMMARY]".ljust(args.border,"-") + "+" + "\n" + "|".ljust(args.border," ") + "|")
    print(("|requests : " + str(requests)).ljust(args.border," ") + "|")
    print(("|strikes  : " + str(strikes)).ljust(args.border," ") + "|")
    print(("|percent  : " + str(strikes/requests*100) + "%").ljust(args.border," ") + "|")
    exit("+".ljust(args.border,"-") + "+")

def current(): # fetches current time
    time = datetime.datetime.now()
    return time.strftime("%H:%M:%S")

banner = """
  ____                _         _    _       _           
 / ___|_ __ __ _  ___| | __    / \  | |_ __ | |__   __ _ 
| |   | '__/ _` |/ __| |/ /   / _ \ | | '_ \| '_ \ / _` |
| |___| | | (_| | (__|   <   / ___ \| | |_) | | | | (_| |
 \____|_|  \__,_|\___|_|\_\ /_/   \_\_| .__/|_| |_|\__,_|
                                      |_|                
"""                                                                                                            
strikecombos = []
requests = 0
strikes = 0
