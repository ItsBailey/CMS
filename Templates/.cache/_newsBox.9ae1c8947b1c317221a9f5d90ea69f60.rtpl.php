<?php if(!class_exists('raintpl')){exit;}?>                    <div class="habblet-container news-promo">
                        <div class="cbb clearfix notitle">
                            <div id="newspromo">
                                <div id="topstories">
                                    <div class="topstory" style="background-image: url(<?php echo $siteTemplateStyle;?>images/top-story/<?php echo $newsFirstImage;?>)">
                                        <h4>Het laatste nieuws</h4>
                                        <h3><a href="news.php?id=<?php echo $newsFirstId;?>"><?php echo $newsFirstTitle;?></a></h3>
                                        <p class="summary"><?php echo $newsFirstShort;?></p>
                                        <p><a href="news.php?id=<?php echo $newsFirstId;?>">Lees meer &raquo;</a></p>
                                    </div>
                                </div>
                                <ul class="widelist">
                                    <li class="odd">
                                        <a href="news.php?id=<?php echo $newsSecondId;?>"><?php echo $newsSecondTitle;?></a>
                                        <div class="newsitem-date"><?php echo $newsSecondPosted;?></div>
                                    </li>
                                    <li class="even">
                                        <a href="news.php?id=<?php echo $newsThirdId;?>"><?php echo $newsThirdTitle;?></a>
                                        <div class="newsitem-date"><?php echo $newsThirdPosted;?></div>
                                    </li>
                                    <li class="last"><a href="news">Meer nieuws &raquo;</a></li>
                                </ul>
                            </div>
                            <?php echo $tplRounder;?>

                        </div>
                    </div>