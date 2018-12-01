<ul class="page-numbers">
                            <?php 
                                //echo $data['products_count'];
                                //echo $data['current_page'];
                                //1 is static coding for number of products
                                $totalPages = ceil($data['products_count'] / 9);
                                $totalPages = intval($totalPages);
                                if(empty($data['is_search']) ){
                                    for($index = 1; $index <= $totalPages; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$index class='page-numbers'>$index</a></li>";  
                                    }
                                }else{
                                    $actual_link = $_SERVER['REQUEST_URI'];
                                    //echo $actual_link;
                                    // echo __URL__;
                                    $pos = strpos($actual_link, '&page=');
                                    //var_dump($pos) ;
                                    //echo strlen($actual_link);
                                    $actual_link = $pos !== false? substr_replace($actual_link, "", $pos) : $actual_link;
                                    //echo $actual_link;
                                    for($index = 1; $index <= $totalPages; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$actual_link&page=$index class='page-numbers'>$index</a></li>";  
                                    }
                                }
                            ?>
                        </ul>