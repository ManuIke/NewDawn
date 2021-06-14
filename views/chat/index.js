var mainContainer = $("#main_container");

var logout = function () {
  firebase
    .auth()
    .signOut()
    .then(
      function () {
        console.log("success");
        window.location.replace("login.html");
      },
      function () {}
    );
};

var init = function () {
  firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        // User is signed in.
        console.log("stay");
        mainContainer.css("display", "");

        const userId = user.uid;
        const userName = user.displayName;

        var UID = userId;
        CometChat.getUser(UID).then(
            (user) => {
                console.log("User details fetched for user:", user);
                // login and launch chat here in embedded mode
                CometChatWidget.login({
                    uid: userId,
                  }).then(
                    (response) => {
                      CometChatWidget.launch({
                          "widgetID": "fb4aecd0-7534-49f5-84f5-916e565852a8",
                          "target": "#cometchat",
                          "roundedCorners": "true",
                          "height": "600px",
                          "width": "800px",
                          "defaultID": "superhero1", //default UID (user) or GUID (group) to show,
                          "defaultType": 'user' //user or group
                      })
                    },
                    (error) => {
                      console.log("User login failed with error:", error);
                      //Check the reason for error and take appropriate action.
                    }
                  )
        },
        (error) => {
            console.log("User details fetching failed with error:", error);
            // create new user, login and launch chat here docked mode
            let apiKey = "d368f07dfb3d0c9b8256ee2ceddc9dbdd74b0c3e";
            var uid = userId;
            var name = userName;

            var user = new CometChat.User(uid);

            user.setName(name);

            CometChat.createUser(user, apiKey).then(
                (user) => {
                    console.log("user created", user);

                    CometChatWidget.login({
                        "uid": userId
                    }).then(response => {
                        CometChatWidget.launch({
                            "widgetID": "WIDGET_ID",
                            "docked": "true",
                            "alignment": "left", //left or right
                            "roundedCorners": "true",
                            "height": "450px",
                            "width": "400px",
                            "defaultID": "superhero1", //default UID (user) or GUID (group) to show,
                            "defaultType": 'user' //user or group
                        });
                    }, error => {
                        console.log("User login failed with error:", error);
                        //Check the reason for error and take appropriate action.
                    });
                },(error) => {
                    console.log("error", error);
                }
            )
        },
        );
    } else {
        CometChat.logout().then(
        () => {
          //Logout completed successfully
          console.log("Logout completed successfully");
        },
        (error) => {
          //Logout failed with exception
          console.log("Logout failed with exception:", { error });
        }
      );
      // No user is signed in.
      mainContainer.css("display", "none");
      console.log("redirect");
      window.location.replace("login.html");
    }
  });
};

init();