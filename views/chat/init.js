var fireBase = fireBase || firebase;
var hasInit = false;
var config = {
    apiKey: "AIzaSyAt_yAVZMMlwHGhfSaw5V1rM706PUoSyiM",
    authDomain: "chatjquery.firebaseapp.com",
    projectId: "chatjquery",
    storageBucket: "chatjquery.appspot.com",
    messagingSenderId: "234346546707",
    appId: "1:234346546707:web:bbd2b41870ddef4ac7e1e6"
  };

if(!hasInit){
    firebase.initializeApp(config);
    hasInit = true;
}

(function () {
    // cometchat initialization
    var appID = "189184b2fbaaeae9";
    var region = "eu";
    var appSetting = new CometChat.AppSettingsBuilder()
      .subscribePresenceForAllUsers()
      .setRegion(region)
      .build();
    CometChat.init(appID, appSetting).then(
      () => {
        console.log("Initialization completed successfully");
        // You can now call login function.
      },
      (error) => {
        console.log("Initialization failed with error:", error);
        // Check the reason for error and take appropriate action.
      }
    );
  })();
  
  // cometchat widget initialization
  window.addEventListener("DOMContentLoaded", (event) => {
    CometChatWidget.init({
      appID: "189184b2fbaaeae9",
      appRegion: "eu",
      authKey: "3a3c39d99bb483d3b2959e16b38f7e027beff73c",
    }).then(
      (response) => {
        console.log("Initialization (CometChatWidget) completed successfully");
      },
      (error) => {
        console.log("Initialization (CometChatWidget) failed with error:", error);
        //Check the reason for error and take appropriate action.
      }
    );
  });