chrome.browserAction.onClicked.addListener(function(activeTab)
{
    var newURL = "./YelpTest.php";
    chrome.tabs.create({ url: newURL });
    //TODO: add new tab window
});