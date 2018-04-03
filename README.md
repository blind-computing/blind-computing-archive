# blind-computing
A website devoted to exposing facts and information about computing in the blind/vi world

## What Is Blind Computing?

This website is the hub of content for blind and visually impaired users that use a computer. We will cover as much as we can, from blind/vi devices, to the latest operating systems, down to accessible tools, programs and web sites that contributers have found useful.

## How to Access the Site

You can visit the blind computing website by [clicking here](https://blindcomputing.org).
  You can also get a sneak preview into what the site will be in the future by visiting the __beta__ version of the site at [this link](https://beta.blindcomputing.org).

## Why all the ReWrites?

  I know, I know. I litterally just rewrote the entire site in __bash__, but come on, it's __bash__! Of course I wasn't going to stick with it.

    Now, before you start BASHING (Ha Ha) your keyboard unnecessarily, bash is a good language. But with what I want to do, it's a major pain in the 
    but. I couldn't even use apache __freakin'__ 2 to host the pages and had to resort to httpd from busybox, all because of bash!

      So, I'm screwing this whole thing and moving back to php, except this time it's going to be implemented correctly.

## How to Contribute

  If you're a programmer, you're allready in the right place. Currently, the site uses the _php-rewrite_ branch to get its files, as we are rewriting it. This will change in the future, so please submit a pull request if you find that this readme is out of date.

### List of Branches

Branch | Description
------ | -----------
php-rewrite | _currently_ the main branch of the project. It holds the new, rewritten version of the site.
mysql-file | contains an __sql dump__ of the database. I try to keep this up-to-date, but it doesn't always happen, so if you find something on the site that's not in the .sql file, please __let me know by opening an issue or via [email](mailto:mikeybuchan@hotmail.co.uk)__.
Master | _Currently_ holds the older shell version of Blind Computing. This will change soon, however.
old-version | Holds the extremely old PHP version of the site before the first rewrite. This is a __protected branch__ and should _not_ be tampered with.
rewrite-2018-01-9 | The old __bash based__ version of the site. This is also a protected branch that should _not_ be messed with.

__note:__ any other branches are topic branches. Their names should convey what they are, but if not,, _feel free to look at the changes_. If there are any stale branches not mentioned above, please contact me to remind me to remove them.
