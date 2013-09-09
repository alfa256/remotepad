remotepad
=========

This is minimalistic tool to keep notes from any device with a browser.


Usage:
-----------------------
Adding a note:
http:/yourhost/n/tag<your note with whatever you want

Ideally your browser will url encode your note so it's very convenient.

Reading notes:
-----------------------
http:/yourhost/n/tag>
This will list all the notes in that tag.

Configuration:
-----------------------
$username => your name
$strict => 1: only listed tags, 0:any tag can be created
$tags = array( tags ) => tags used for strict mode and listing, remember that this only lists links to whatever is in the $tags array whether strict is on or not.

Reading notes:

http://localhost/remotepad/n/notes>

<img src="http://i.imgur.com/HDZ4D2R.png" title="reading some notes"/>

Adding a note:

<img src="http://i.imgur.com/xJOZDV5.png" title="adding a note"/>

More features will be added but i'll try to keep this minimal.

I would love to see other minimalistic contributions to this.
