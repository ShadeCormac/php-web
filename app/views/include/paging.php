<ul class="page-numbers">
                            <?php 
                                //echo $data['products_count'];
                                //echo $data['current_page'];
                                //1 is static coding for number of products
                                $totalPages = ceil($data['products_count'] / 9);
                                $totalPages = intval($totalPages);
                                $start_page = 1;
                                $end_page;
                                if($totalPages - $data['current_page'] >= 5 ){
                                    $start_page = ($data['current_page'] <= 2) ? 1 : $data['current_page'] - 2;
                                    $end_page = ($data['current_page'] <= 2) ? 5 : $data['current_page'] + 2;
                                }else {
                                    if($data['current_page'] - (4 - ($totalPages - $data['current_page'])) <= 0){
                                        $start_page = $data['current_page'];
                                    }
                                    else {
                                        $start_page = $data['current_page'] - (4 - ($totalPages - $data['current_page']));
                                    }
                                    
                                    $end_page = $totalPages;
                                }
                                if(empty($data['is_search'])){
                                    for($index = $start_page; $index <= $end_page; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$index class='page-numbers'>$index</a></li>";  
                                    }
                                }else {
                                    $actual_link = $_SERVER['REQUEST_URI'];
                                    //echo $actual_link;
                                    // echo __URL__;
                                    $pos = strpos($actual_link, '&page=');
                                    //var_dump($pos) ;
                                    //echo strlen($actual_link);
                                    $actual_link = $pos !== false? substr_replace($actual_link, "", $pos) : $actual_link;
                                    //echo $actual_link;
                                    for($index = $start_page; $index <= $end_page; $index++){
                                        if($index == $data['current_page'])
                                            echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                        else echo "<li><a href=$actual_link&page=$index class='page-numbers'>$index</a></li>";  
                                    }

                                    // for($index = 1; $index <= $totalPages; $index++){
                                    //     if($index == $data['current_page'])
                                    //         echo "<li><span class='page-numbers current'>$index</span> /</li>";
                                    //     else echo "<li><a href=$actual_link&page=$index class='page-numbers'>$index</a></li>";  
                                    // }
                                }
                            ?>
</ul>