<table class="tableTmp" border="7" width="777">
  <thead>
  <tr>
    <th>id</th>
    <th>Directory/file name</th>
    <th>Size</th>
    <th>Event</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $listOfFile = getListOfFile(UPLOADDIR);
    $sizeOfFile = getSizeOfFile(UPLOADDIR);
    $id = 1;
    if($listOfFile)
    {
      foreach($listOfFile as $file)
      {
        $fileName = $file;
        $fileSize = sizeConverter($sizeOfFile[$id -1]);
        $event =
        "<td>
          <form action=\"\" method=\"post\">
          <input type=\"hidden\" name=\"fname\" value=\"{$fileName}\">
          <button class=\"del-button\" type=\"submit\">Delete</button>
          </form>
        </td>\n";
        echo "<tr align=\"center\">\n";
        echo "<td>{$id}</td>\n";
        echo "<td>{$fileName}</td>\n";
        echo "<td>{$fileSize}</td>\n";
        echo $event;
        echo "</tr>\n";
        $id += 1;
      }
    }
    else
    {
      echo "<tr align=\"center\">\n";
      echo "<td colspan=\"4\">You can't get list of files.</td>\n";
      echo "</tr>\n";
    }
  ?>
  </tbody>
</table>
