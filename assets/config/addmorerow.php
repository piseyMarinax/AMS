<?php
include('dbloaded.php');
$sql = "SELECT * FROM atb_statuses WHERE sstatus = 1 ";

			$query = $conn->prepare($sql);
			$query->execute();$ststatus = "<option value=''>.: Title :.</option>";
			for($i=0; $row = $query->fetch(); $i++){
				$ststatus.="<option value=".$row['id'].">".$row['statustitle']."</option>";
			}
?>
													<tr class="status-item">
                                                        <td> <input type="checkbox" name="item_index[]" class="mt-checkbox mt-checkbox-outline"> </td>
                                                        <td>
                                                        	<select name="stStatus[]" class="form-control">
																<!--<option value="1">Single</option><option value="2">Married</option>
																<option value="3">Divorced</option><option value="4">Widow</option>
																<option value="5">Disable</option>-->
																<?php echo $ststatus;?>
															</select>
														</td>
                                                        <td>
                                                        	<select name="status[]" class="form-control">
                                                        		<option value="">.: Status :.</option>
																<option value="1">Active</option><option value="0">Disable</option>
                                                        	</select></td>
                                                        <td> <input class="form-control datepicker" type="text" name="sissuedate[]" id="sissuedate" placeholder="dd-mm-yyyy" > </td>
                                                        <td> <input class="form-control datepicker" type="text" name="sexpiredate[]" id="sexpiredate" placeholder="dd-mm-yyyy" > </td>
                                                        <td> <input type="file" name="filerefer[]"> </td>
                                                    </tr>
