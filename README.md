# music-search-engine

The main idea of this project is for users to store their favorite songs and to search songs by their title, album, and artist. For instance, a user's input to the search engine could be:
  * song name ‘lonely’, OR
  * song name ‘lonely’ and artist name ‘akon’, OR
  * song name ‘lonely’, artist name ‘akon’ and album title ‘lonely’
  
The result will be shown by ‘best matching’ to ‘least matching’ (i.e. the exact matching result comes first, ‘%name’ comes next, ‘name%’ comes next, and then ‘%name%’ comes at last from the SQL query).The search engine gives users a list of songs with song title, album name, year the song was leased, artist name, album title, and the company name that produced the song’s album.

**What users can do**
1. create an account with their userID (in their email form), password, age, gender, and first and last name
2. log into the website
3. search songs (performed case-insensitive) by song title, artist, or album, or by all of them
4. like songs by clicking a heart button on the right side of any songs (i.e. put the songs they like into their favorite list)
5. have access to their favorite song list
6. check out statistics of how many people from each age-group like certain artists or companies
7. see a certain number of most popular songs, artists and albums of their choice (e.g. a user clicks the check-box for
‘popular songs’ and types in a number 100. Then it will show the top 100 most popular songs)
8. serach for the songs with the highest danceability, loudness, and expert rates

**What administrators can do**
1. add and delete songs, artists, and albums by their ID
2. add songs of already existing (or registered on the website) artists and albums
3. If they want to add songs of artists/albums that does not exist on the website, they should add artist/album first
4. search for a song by its title, artist, or album
5. see song ID, artist ID, and album ID
6. update user information or delete users
