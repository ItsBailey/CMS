                    <div class="habblet-container news-promo">
                        <div class="cbb clearfix notitle">
                            <div id="newspromo">
                                <div id="topstories">
                                    <div class="topstory" style="background-image: url({$siteTemplateStyle}images/top-story/{$newsFirstImage})">
                                        <h4>Het laatste nieuws</h4>
                                        <h3><a href="news.php?id={$newsFirstId}">{$newsFirstTitle}</a></h3>
                                        <p class="summary">{$newsFirstShort}</p>
                                        <p><a href="news.php?id={$newsFirstId}">Lees meer &raquo;</a></p>
                                    </div>
                                </div>
                                <ul class="widelist">
                                    <li class="odd">
                                        <a href="news.php?id={$newsSecondId}">{$newsSecondTitle}</a>
                                        <div class="newsitem-date">{$newsSecondPosted}</div>
                                    </li>
                                    <li class="even">
                                        <a href="news.php?id={$newsThirdId}">{$newsThirdTitle}</a>
                                        <div class="newsitem-date">{$newsThirdPosted}</div>
                                    </li>
                                    <li class="last"><a href="news">Meer nieuws &raquo;</a></li>
                                </ul>
                            </div>
                            {$tplRounder}
                        </div>
                    </div>