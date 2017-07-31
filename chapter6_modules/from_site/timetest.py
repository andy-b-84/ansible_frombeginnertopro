#!/usr/bin/python

import datetime
import sys
import json
import os
import shlex

args_file = sys.argv[1]
args_data = file(args_file).read()

arguments = shlex.split(args_data)

for arg in arguments:
    if "=" in arg:
        (key, value) = arg.split("=")
        if key == "time":
            rc = os.system("date -s \"%s\"" % value)
            if rc != 0:
                print(json.dumps({
                    "failed" : True,
                    "msg" : "failed setting the time"
                }))
                sys.exit(1)

            date = str(datetime.datetime.now())
            print(json.dumps({
                "time": date,
                "changed": True
            }))
            sys.exit(0)
                 
date = str(datetime.datetime.now())
print(json.dumps({
    "time": date,
    "changed": True
}))
