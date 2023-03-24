<?php $no = 1; ?>
                                        <?php foreach( $makanan as $row ) : ?>
                                        <tr>
                                            <td><?= $no?> </td>
                                            <td><?= $row["nama_makanan"]?></td>
                                            <td><img src="./foto/makanan/<?=$row["gambar"]; ?> " alt="hotdog" width="100"></td>
                                            <td><?= $row["harga_makanan"]?></td>
                                            
                                        </tr>
                                        <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php
require 'functions.php';
$makanan = query("SELECT * FROM menu");
?>