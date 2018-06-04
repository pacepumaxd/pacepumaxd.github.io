import time

battery = 100
speed = 0
i = 0

filename = "batteryspeed.txt"
while True:
	i = i+1
	if(i%100 == 0):
		battery -= 1
	if(i%10 == 0):
		speed += 0.5

	if(battery <= 10):
		battery = 100
	if(speed >= 30):
		speed = 1

	string = str(battery) + "," + str(speed)
	fp = open(filename, "w")
	fp.write(string)
	fp.close()
	print(string)
	time.sleep(0.1)
