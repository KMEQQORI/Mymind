importScripts('./node_modules/workbox-sw/build/workbox-sw.js')
const staticAssets =[
    './',
    './doneTask.hml'
];

if (workbox) {
    console.log(`Yay! Workbox is loaded 🎉`);
} else {
    console.log(`Boo! Workbox didn't load 😬`);
}


workbox.precaching.precacheAndRoute([
/*    'index.html',
    'doneTask.html',
    'InProgressTask.html',
    'card.html',
    'GoalsCards.html',
    'js/bootstrap.min.js',
    'js/jquery-3.3.1.slim.min.js',
    'js/popper.min.js',
    'js/jquery.min.js',
    'js/moment.min.js',
    'js/tempusdominus-bootstrap-4.min.js',
    'js/flipclock.js',
    'js/bootstrap-datepicker.min.js',
    'js/mustache.js',
    'js/index.js',
    'goals.html'
    */
]);

