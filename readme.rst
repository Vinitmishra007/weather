###################
description 
###################


1.Create a component to consume weather API that takes location (zip/city) as input and returns the weather details for that location
you can access the temerature of any city , just by changing the city name from the below url
    
		http://localhost/weather/index.php/welcome/get_weather?city=tokyo
		
		
2.Write a few unit test cases for your component in the test framework of your choice

If the expected_result and the actual weather of that city matches then the result will be passed else it will show failed , we can check it by changing the values in the url 
    http://localhost/weather/index.php/welcome/testcase?city=canada&expected_result=9
		
		
3.If you have experience in UI, only then also consume this component to show the weather details in desktop-based or browser-based applications

Below URL will give UI view with some limited cities in dropdown
    http://localhost/weather/
