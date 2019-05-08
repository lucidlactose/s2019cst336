// Scout.players.search("Ninja", "epic", null, "fortnite").then(results => {
//       console.log(results)
//     })
    
// this should be an on Click to
// this is code that allows to subscrive to a player / follow it
// function follow() {
//   let subscription = await Scout.players.subscribe("fortnite", "AQUACAGRzjVHkjKvTIpbF3ibQPec", "*"))
  
//   subscription.on("data", (player) => {
//     console.log(player)
//   })
// }

$(function() {
    
});
function signOut() {
    
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
    auth2.disconnect();
}