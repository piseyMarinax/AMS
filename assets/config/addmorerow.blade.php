													<tr class="status-item">
                                                        <td> <input type="checkbox" name="item_index[]" class="mt-checkbox mt-checkbox-outline"> </td>
                                                        <td>
                                                        	<select name="stStatus[]" class="form-control">
																<option value="0">Select</option>
																{{\App\Helpers\Helpers::getStatus(0,0,'')}}
															</select>
														</td>
                                                        <td>
                                                        	<select name="status[]" class="form-control">
                                                        		<option value="1">Active</option><option value="0">Disable</option>
                                                        	</select></td>
                                                        <td> <input class="form-control datepicker" type="text" name="sissuedate[]" id="sissuedate" placeholder="day-Month-Year" > </td>
                                                        <td> <input class="form-control datepicker" type="text" name="sexpiredate[]" id="sexpiredate" placeholder="day-Month-Year" > </td>
                                                        <td> <input type="file" name="filerefer[]"> </td>
                                                    </tr>