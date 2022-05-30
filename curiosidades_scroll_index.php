<?php
if(isset($_POST["limit"], $_POST["start"]))
{
    require("ligar.php");
 //$connect = mysqli_connect("localhost", "root", "", "social");
 $query = "SELECT * FROM curiosidades ORDER BY codigo DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($mysqli, $query);
 while($row = mysqli_fetch_array($result))
 {
echo '
                                 <div class="col-md-6">
                                <div class="blog-wrap">
                                    <div class="blog-image">
                                        <a href="curiosidades_index2.php?codigo_news='.$row["codigo"].'" data-tilt="" data-tilt-perspective="110" data-tilt-speed="400"
                                            data-tilt-max="1.2">
                                            <img src="curiosidade/'.$row["img"].'"
                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                        </a>
                                        <div class="blog-label">
                                            <h6><i class="iw-13 ih-13" data-feather="heart"></i>Visualizações:</h6>
                                            <h6><i class="iw-14 ih-14" data-feather="message-circle"></i>'.$row["view"].'</h6>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <div class="detail">
                                      
                                            <h6><i class="iw-15 ih-15" data-feather="clock"></i>Publicado dia '.$row["data"].' às '.$row["hora"].'</h6>
                                        </div>
                                        <a href="curiosidades_index2.php?codigo_news='.$row["codigo"].'">
                                            <h5>'.$row["titulo"].'</h5>
                                        </a>
                                        <p>'.$row["descricao"].'
                                        </p>
                                    </div>
                                </div>
                            </div>
                                   
  ';
 }
}

?>