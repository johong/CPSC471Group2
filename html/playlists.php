<?php (include "header.php");
echo "<br/>";
echo "<br/>";
echo "<br/>";

    #personal testing info
    #$link = mysqli_connect("localhost", "root", "", "cpsc471_musicdatabase.sql");

    if($link === false)
    {
           die("ERROR: could not connect. " . mysqli_connect_error());
    }
    echo $userID;
    // if($userID === null)
    // {
        // die("ERROR: not a set user")
    // }
    $playlist = "SELECT *
                FROM playlist";
                #WHERE uid = userID";
                
    if($result = mysqli_query($link, $playlist))
    {
        if(mysqli_num_rows($result) > 0)
        {
            echo "<h1 style='text-align:center;'>Playlists</h1>";
            echo "<table style='width:100%'>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td style='font-size:125%;text-align:center;'>" . '<a href="getPlaylist.php?link=' . $row["name"]. '">' . $row['name']."</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
        else
        {
            echo "There are no playlists yet";
        }
    }
    else
    {
        echo "ERROR: Could not execute $sql." . mysqli_error($link);
    }
    
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo '<a href="newPlaylistForm.php">Create New Playlist</a>';
    
    mysqli_close($link);

(include "footer.php");
?>