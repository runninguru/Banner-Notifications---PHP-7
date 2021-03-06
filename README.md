<h1 align="center" id="urls">Notify - PHP 7</h1>
<h4 align="center">a notify class to easily create and display banner notifications in PHP 7/HTML/CSS</h4>

<p align="center">
<a href="http://amarlearning.mit-license.org/"><img src="https://img.shields.io/pypi/l/pyzipcode-cli.svg" alt="mit license"></a>
<img src="http://kylebirch.info/images/build_passing.png">
</p>

This class will display banner notifications in a typical manner: red, yellow, green, and blue for each error, warning, success, and info banners. All errors of a given type are appended to each other until they are displayed, and multiple types of banners can be displayed simultaneously.

## How it works
<p>It's pretty simple</p>
<h4>create a note</h4>
<p>$note = new Notification();</p>
<p>$note->addNote('error', 'Incorrect Password');</p>
<h4>create a note with a generic message.</h4>
<p>$note->addNote('error');</p>
<h4>display notes</h4>
<p>This will also unset the object's properties, deleting the notes after they have been displayed.</p>
<p>$note->notify();</p>
  
## Issues
No known issues.

You can report the bugs at the [issue tracker](https://github.com/runninguru/Banner-Notifications-PHP-7)

[:arrow_up:\[Back to Top\]](https://github.com/runninguru/Banner-Notifications-PHP-7)



***

## License
Kyle Birch([@runninguru](http://github.com/runninguru)) under [MIT License](https://choosealicense.com/licenses/mit/) 

[:arrow_up:\[Back to Top\]](https://github.com/runninguru/Banner-Notifications-PHP-7)


