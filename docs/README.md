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
47. made view class
48. moved scripts/start.js to src/scripts/start.js
49. moved bs-config.js to src/config/bs-config.js - file paths might cause errors later
49. moved tailwind to src/config/ as well - file paths could be an issue later?
50. tried moving package.json and node_modules, didnt work
51. looking into the register controller + n layer complexity
52. mysql errors, sorted it out by deleting files
53. db class - logs | var_dump db + logs shows up in services
54. src/data/test.php works when i require vendor_autoload
55. model class
56. auth controller - register
57. migration class
58. user migration class
59. app container + services
60. loaders directory for migrations
61. migration script to run migrations


# errors

1. tailwind config in error page must be error with tailwind.config.js
2. error class should only be used in dev environment
3. 

# next

1. create a migration loader to reigster / inject all classes 
1. make button components - and reusable primary colors - dark / light theme?
1. registration
1. clean up root directory
1. error pages 
    - 404 not found
    - not authorized
1. coonect + test db

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





You're working on a very ambitious and modular PHP/JS framework, and it sounds like you're trying to build something both flexible and secure from the ground up. The way you organize your code is already on the right track, and you're focusing on making things as reusable as possible, which is great for long-term maintainability.

To answer your question: Yes, it would be beneficial to first create a basic user authentication system (login, registration, storing user info in the database) before turning it into a more generalized authentication module for your framework. This initial work will help you address the core functionality, and once it's in place, you can build upon it to support other features.

Here’s why:

1. Foundational Authentication System:
User Registration and Login are the most fundamental components of a secure app. You need to establish how users will authenticate (through passwords, possibly email confirmation, or multi-factor authentication in the future). If you don't have this basic functionality, it will be difficult to add role-based authorization, permissions, or any advanced security features later on.
By building this first, you can focus on getting the core user authentication and session management right. This includes password hashing, secure login and logout mechanisms, session or token management, etc. Once you have this solid foundation, you can scale it to fit the needs of a broader system.
2. Security Best Practices:
Security is a major concern in any framework, especially for user authentication. By implementing the basics of secure authentication early on (password hashing with bcrypt or argon2, secure cookie handling, CSRF protection, etc.), you can be sure your framework’s security is strong from the start.
Having these features done early will allow you to test and verify that your framework's security is properly built out before expanding to more complex authorization roles or additional features like OAuth, multi-factor authentication, etc.
3. Modularization and Extensibility:
When you start building the modular parts of your framework, such as roles, permissions, authorization, and user-specific actions, you will have a solid authentication foundation to build on top of. For example, once the login system is complete, you can move on to creating role-based access control (RBAC) or implementing policies to enforce specific access rules based on user roles.
A basic authentication system also gives you a reliable and tested module to hook into other parts of your framework. If you first create the authentication system in a general and modular way, you’ll ensure that things like middleware or controllers for authentication can be reused across multiple apps and use cases.
4. Ease of Scaling Later:
If you focus on building the framework with reusable features right away (i.e., creating a complex, abstract authentication system first), you might end up in a situation where you're trying to build a feature before validating its simplest implementation. This could lead to frustration and potentially having to refactor large parts of your framework later.
Starting with the basic user authentication provides a clearer path to scaling and extending it with features like JWT authentication, OAuth, or social logins in the future. You’ll be able to incorporate them more seamlessly once you have the basics solid.
5. Clear Separation of Concerns:
You're structuring your app with multiple layers (app, core, data, security, etc.), which is awesome for keeping things modular and decoupled. Once the basic authentication is done, you’ll be able to refactor and extract components (e.g., user model, password management, session handling) into your security and data layers.
The security folder can contain components for authentication, authorization, and encryption, and you can tie it into your user model and database through your data and domain layers. The result is clean separation between your authentication logic and other parts of your app, which can be reused across different projects.
Proposed Steps for Implementation
Basic User Authentication:
Create a User model in your data/models/ directory to represent the user and handle database operations.
Implement registration (with secure password hashing) and login functionality. Store users’ hashed passwords in the database and handle session management (using cookies or JWT tokens).
Add middleware in app/middleware/ to ensure authenticated routes are protected.
Security Best Practices:
Implement password hashing with a strong algorithm (e.g., bcrypt or Argon2).
Secure user sessions with proper session handling or JWT tokens (depending on your needs).
Implement middleware for CSRF protection and input sanitization.
Authorization and Roles:
Once basic authentication is in place, build role-based access control (RBAC) and permission systems.
Implement policies in your domain/policies/ folder to control access to specific resources or actions based on user roles and permissions.
Define interfaces in domain/interfaces/ to abstract different authorization mechanisms (e.g., admin vs. regular user).
Expanding into Modular Authentication Features:
Once the basic system is solid, add features like email verification, password reset functionality, multi-factor authentication, etc., by plugging them into the security/authentication/ folder.
Ensure that the system is flexible enough to be used in different scenarios by building reusable components (e.g., AuthService, RoleService, etc.).