													<tr class="status-item">
                                                        <td> <input type="checkbox" name="item_index[]" class="mt-checkbox mt-checkbox-outline"> </td>
                                                        <td>
                                                        	<select name="stStatus[]" class="form-control">
                                                        	<?php
                                                        	foreach ($sstatus as $sval) {?>
															    <option value="<?php echo $sval->id;?>"><?php echo $sval->statustitle;?></option>
															<?php
															}
                                                        	?>
                                                        	</select>
														</td>
                                                        <td>
                                                        	<select name="status[]" class="form-control">
                                                        		<option value="1">Active</option><option value="0">Disable</option>
                                                        	</select></td>
                                                        <td> <input class="form-control datepicker" type="text" name="sissuedate[]" placeholder="day-Month-Year" > </td>
                                                        <td> <input class="form-control datepicker" type="text" name="sexpiredate" placeholder="day-Month-Year" > </td>
                                                        <td> <input type="file" name="filerefer[]"> </td>
                                                    </tr>