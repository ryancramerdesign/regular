# ProcessWire Uikit 3 site/blog profile

This is a simple ProcessWire site profile that is somewhat like our default site profile,
but also includes a blog. It demonstrates development of various features including some 
recently introduced on the ProcessWire 3.x development branch. The front-end of this 
profile uses the Uikit 3 library and includes a library of time-saving functions for 
working with Uikit 3. Below are a few highlights you'll find in this site profile:

- Use of markup regions and the new ProcessWire functions API.
- Use of Uikit 3 in template files and includes a handy PHP library of Uikit-specific functions.
- Demonstrates front-end editing features on this page.
- Uses pagination (after 10+ blog posts) and demonstrates use of comments as well.
- Demonstrates use of a Page reference field, as used by categories in the blog.
- The template files are easy-to-read and modify, and serve as a good platform to build from.
- Demonstrates implementation of a custom hook function (see in the /site/ready.php file).

## Requirements

- ProcessWire 3.0.51 or newer
- Uikit 3 (already present in /site/templates/uikit/)
- PHP 5.4 or newer

## How to install

1. Obtain a fresh copy of ProcessWire 3.0.51 or newer, and place/unzip it on your server.

2. Place the /site-regular/ directory from this site profile into the directory where 
   you placed/unzipped ProcessWire. You will see other site directories already there, 
   like /site-default/, which is included with the PW core. You can leave them for now.

3. Now install ProcessWire by accessing the URL it lives in from your web browser. When
   it asks you to choose a site profile, choose the "Uikit 3 site/blog profile". 


