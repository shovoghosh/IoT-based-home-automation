import RPi.GPIO as GPIO
import urllib2
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(2,GPIO.OUT)
GPIO.setup(3,GPIO.OUT)
GPIO.setup(4,GPIO.OUT)
GPIO.setup(17,GPIO.OUT)
true = 1
while(true):
                try:
                        response = urllib2.urlopen('https://myhomeautom.000webhostapp.com/buttonStatus.php')
                        status1 = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                
                if status1=='ON':
                    GPIO.output(2,GPIO.LOW)
                    print status1
                elif status1=='OFF':
                    GPIO.output(2,GPIO.HIGH)
                    print status1


                try:
                        response = urllib2.urlopen('https://myhomeautom.000webhostapp.com/buttonStatus2.php')
                        status2 = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                
                if status2=='ON':
                    GPIO.output(3,GPIO.LOW)
                    print status2
                elif status2=='OFF':
                    GPIO.output(3,GPIO.HIGH)
                    print status2


                try:
                        response = urllib2.urlopen('https://myhomeautom.000webhostapp.com/buttonStatus3.php')
                        status3 = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                
                if status3=='ON':
                    GPIO.output(4,GPIO.LOW)
                    print status3
                elif status3=='OFF':
                    GPIO.output(4,GPIO.HIGH)
                    print status3



                try:
                        response = urllib2.urlopen('https://myhomeautom.000webhostapp.com/buttonStatus4.php')
                        status4 = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                
                if status4=='ON':
                    GPIO.output(17,GPIO.LOW)
                    print status4
                elif status4=='OFF':
                    GPIO.output(17,GPIO.HIGH)
                    print status4


