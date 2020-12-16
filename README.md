# The Game Closet

__IT 354 - Advanced Web Application Development 
Maksim Zubritckii for Illinois State University, Spring 2020 Semester__

## Installing The Game Closet

1.  Download source files from [GitHub](https://github.com/TsarGun/TheGameCloset)
2.  Download and install [Node.js](https://nodejs.org/en/download/) which also includes the package manager used by Node ([npm](https://www.npmjs.com/))
    -   Verify that Node and npm are properly installed by opening a command prompt/terminal window and entering the commands `node -v` and `npm -v`
3.  Install the `client` project downloaded from GitHub by opening a command prompt/terminal window in the `client` folder, then running `npm i` to download and install the client project's dependencies

## Running The Game Closet

1.  Open a command prompt/terminal window in the `client` folder and use the command `npm start` to run the webpack development server. This will not only provide the website at `localhost:8080`, but will automatically rebundle files when changes are detected (which allows for easier updating/debugging of the client side code)
2.  Open a command prompt/terminal window in the `server` folder and user the command `npm start` to run the Express.js based backend. On launch, the server project will request a valid login for use with mongoDB; a user `mzubrit` with password `TsarCannon` was created specifically for demonstrating the app.
3.  Open `http://localhost:8080/` in the browser. The first time, try to use any combination in the login fields. The second time, try to login using `test` as the user and `abc123` as the password.

## How It Works

The two projects provide a full stack JavaScript experience. The `client` project is a Vue.js application that utilizes Webpack.js to bundle and generate static files to serve to the user. The `server` project is an Express.js framework on Node that contacts mongoDB for database access.

When a user connects to the front-end website (located at `localhost:8080`), they are served static asset files (HTML, CSS, JS) created by the webpack bundler, as defined by the various Vue component files. Whenever a database action occurs, a request is made to the `server` project via `localhost:8081` which in turn handles taking the request and sending the appropriate request to mongoDB. This allows users to feel they have full control over the contents of their 'game closet' without actually giving users direct database access. This also allows the developer to provide hidden attributes, such as a `view` boolean to indicate if a game should be contained in a particular display, or a `remove` flag to indicate to the DBA that the user has requested an object be removed
