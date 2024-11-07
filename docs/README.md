# steps

1. basic file structure
2. git init
3. add homepage
4. custom localhost error - logger
5. install tailwind
6. connect browser sync
7. build script
8. reconfigure tailwind
9. public layout file 
10. home and about page
11. comopnents/navigation - header + footer
12. updated build script for better logging
13. redo localhost error logger - better UI
14. nice UI for header - working on components app + src
15. moved routes/ and storage/ into src/ and app/
16. db info to .env.dev 
17. make form components
18. localhost erorrs - handlers
19. created an entry point for the app/ in app/app.php
20. error handler
21. spent a whole day on logging and failed`
22. looked into adding new features/other files tructures and learnt about containers and services and interfaces
23. creaated a container for /src/ 
24. created a class for column templates
25. created a class for resusable cards
26. difficulty logging into mysql again
27. logged into mysql 
28. creating db singlton
29. creating env singleton
30. redoing the db singleton and env singleton
31. create loadEnv.sh to load the different env files 
32. testing db class w/ variables in the file
33. db class difficulty using logger, might setup interfaces 
34. db class / logger difficulties - gave up
35. test db connection (success)
36. split the routes file into pages + auth
37. added the form class to src/presentation/views/components
38. add logs to find out if the user controller is registering the submit form 
39. create view class, so controllers can easily return different views
40. working on auth
41. restructing app/ for n layers
42. simple form to add users to db and redirect to login page
43. trying to make view class - not working
44. making error handler to display localhost errors nicely (i removed the one from step 18 for somereason)
45. error handler class - remove file paths
46. error handler page - tailwind
47. 


# errors

1. tailwind config in error page must be error with tailwind.config.js
2. error class should only be used in dev environment
3. 

# next

1. move log level to config.php
1. 
1. make button components - and reusable primary colors - dark / light theme?
1. registration
1. clean up root directory
1. error pages 
    - 404 not found
    - not authorized
1. make form components
1. coonect + test db
1. update build script

# future file strucutre

- app
    - config
    - controllers
    - services
    - events
    - listeners
    - middleware
    - routes
    - database
    - models
    - views
    - storage
    - containers
    - caching
    - interfaces
    - tests
    - console
    - api
    - policies
    - notifications
    - handlers
    - authorisation
    - authentication
    - validation 
    - encyprtion






ok so now I've setup the routing in the framework to handle the routing in the app with the addition of middleware, and I've split up the routes/*.php files into multiple files for better organisation. I can now switch between public pages like about, home, contact, register, 

so now I need to work on registering users in the db

so I need to do the following steps: 
1. make sure the form uses the correct route
2. make sure the router is setup to send the submit register form to the register controller to register users
3. make sure the register controller logs that the register submit form button was pressed 

so now at this stage I can switch between pages using the guest controller, and I can enter my username and password and click submit on the form and the register controller will log the button press. 

4. So now I can work on the registration logic for adding users to the database. 
5. then I can redirect success registration attempts to the login page and setup the logic controller 
6. now I can setup middleware and make sure that only auth users can access the /dashbaord page

if that seems like a good plan I just want you to reply with yes
