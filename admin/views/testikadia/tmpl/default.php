<?php
	if($this->arrDatos){		//If data available
?>
<style type="text/css">
	label {
		display:inline;
		font-weight:bold;
	}
</style>
<div style="margin-top:40px">
	<div style="display:inline;">
<label><?php echo JText::_('COM_TESTIKADIA_STATE');?>:</label>
<select id="selState">
	<option value="Enabled"><?php echo JText::_('COM_TESTIKADIA_ENABLED');?></option>
	<option value="Disabled"><?php echo JText::_('COM_TESTIKADIA_DISABLED');?></option>
</select>
</div>
<div style="display:inline;">
<label><?php echo JText::_('COM_TESTIKADIA_TYPE');?>:</label>
<select id="selType">
	<?php
		foreach($this->arrTypes as $t){
	?>
	<option value="<?php echo $t[0]?>"><?php echo $t[0]?></option>
	<?php
		}
	?>
</select>
</div>
</div>
<table id="nicetable">
	<thead>
		<tr>
			<th>ID</th>
			<th><?php echo JText::_('COM_TESTIKADIA_STATE');?></th>
			<th><?php echo JText::_('COM_TESTIKADIA_NAME');?></th>
			<th><?php echo JText::_('COM_TESTIKADIA_TYPE');?></th>
			<th><?php echo JText::_('COM_TESTIKADIA_AUTHOR');?></th>
			<th><?php echo JText::_('COM_TESTIKADIA_VERSION');?></th>
			<th><?php echo JText::_('COM_TESTIKADIA_DATE');?></th>
		</tr>
	</thead>
	<tbody>
<?php
		foreach($this->arrDatos as $d){
			$jsonDetails = json_decode($d[3],1);		//Decoding json data from db
?>
	<tr>
		<td><?php echo $d[0]?></td>
		<td><?php echo ($d[4]==0) ? 'Disabled' : 'Enabled';?></td>
		<td><?php echo $d[1];?></td>
		<td><?php echo $d[2]?></td>
		<td><?php echo $jsonDetails['author']?></td>
		<td><?php echo $jsonDetails['version']?></td>
		<td><?php echo $jsonDetails['creationDate']?></td>
	</tr>
<?php
		}
?>
</tbody>
</table>
<?php
	}
?>
<script type="text/javascript">
var objTabla = null;
jQuery(document).ready(function(){
	objTabla = jQuery('#nicetable').DataTable();
	jQuery('#selState').on('change',function(){
		var val = jQuery(this).val();
		objTabla.column(1).search(val,true,false).draw();
	});
	jQuery('#selType').on('change',function(){
		var val = jQuery(this).val();
		objTabla.column(3).search(val,true,false).draw();
	});
});
</script>
