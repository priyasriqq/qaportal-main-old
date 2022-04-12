<div id="container" class="container-fluid">
			<div class="row flex-xl-nowrap">
			<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
		      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Application Log Time Stamp');
        data.addColumn('string', 'Automation Time Stamp');
        data.addColumn('string', 'Tenant');
        data.addColumn('string', 'Username');        
        data.addColumn('string', 'Module');  
        data.addColumn('string', 'Web Server');
        data.addColumn('string', 'Application error Log');        
        data.addColumn('string', 'Automation Error');     
        data.addRows([
          ['2018-06-24 02:02:31.1746','2018-06-24 02:04:24','consolMAR18MAC','PNALLAMOTHU@HOSTANALYTICS.COM','Dynamic_Charts','HYD-NTLYWEB01','D://Conference//TanentAppLog//06-24-2018//Reporting//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT27//HA.TestExecute.Consolidation.Core_Consolidation_Reclass_ForecastMiddleYear_Centralization_Execute.log'],
          ['2018-06-24 02:02:43.9110','2018-06-24 02:04:02','ReportingATMT10JAN10','skogara@hostanalytics.com','Data_Reporting','HYD-NTLYWEB01','D://Conference//TanentAppLog//06-24-2018//WFP//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT10//HA.TestExecute.Reporting.SN_REP_CPM_21646.log'],
          ['2018-06-24 02:09:13.0470','2018-06-24 02:12:01','ReportingAutomationMAC2251','skogara@hostanalytics.com','Common_Utility','HYD-NTLYWEB03','D://Conference//TanentAppLog//06-24-2018//Reporting//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//MAC2251//HA.TestExecute.Reporting.Jarvis.TableExport.log'],
          ['2018-06-24 08:11:44.3904','2018-06-24 08:12:19','ETLCPMTENANTBASEGrid5','qaautomationrun3@hostanalytics.com','Consolidation_ControlPanel','HYD-NTLYWEB01','D://Conference//TanentAppLog//06-24-2018//Consolidation//TAPP_ATT27.txt','D://Conference//AutomationLog//06-24-2018//ATMT21//HA.TestExecute.DI.RT_Translations_DLRLevel_Actuals_LockPeriods2_Execute.log'],
          ['2018-06-24 02:19:01.4823','2018-06-24 02:20:01','ReportingAutomationMAC2250','skogara@hostanalytics.com','Dashboard','HYD-NTLYWEB03','D://Conference//TanentAppLog//06-24-2018//DI//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//MAC2251//HA.TestExecute.Reporting.Jarvis.ActualData.log'],
          ['2018-06-24 02:09:21.6129','2018-06-24 02:10:33','ConsolMac2074','qaautomationrun3@hostanalytics.com','Dynamic_Charts','HYD-NTLYWEB02','D://Conference//TanentAppLog//06-24-2018//Planning//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT27//HA.TestExecute.Consolidation.Core_Consolidation_Reclass_ForecastMiddleYear_DECentralization_Execute.log'],
          ['2018-06-24 02:11:01.6223','2018-06-24 02:12:01','ReportingAutomationMAC2075','skogara@hostanalytics.com','Dynamic_Charts','HYD-NTLYWEB03','D://Conference//TanentAppLog//06-24-2018//CommonAreas//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//MAC2251//HA.TestExecute.Reporting.Jarvis.BudgetTableExport.log'],
          ['2018-06-24 09:45:01.1427','2018-06-24 09:47:33','CPMTENANTBASE','qaautomationrun5@hostanalytics.com','User_Management','HYD-NTLYWEB03','D://Conference//TanentAppLog//06-24-2018//Reporting//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT27//HA.TestExecute.Consolidation.Core_Consolidation_Reclass_ForecastMiddleYear_Centralization_Execute.log'],
          ['2018-06-24 10:23:34.4899','2018-06-24 10:24:41','TESTCPMTENANTBASE','qaautomationrun1@hostanalytics.com','Data_Integration','HYD-NTLYWEB01','D://Conference//TanentAppLog//06-24-2018//Reporting//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT27//HA.TestExecute.Consolidation.Core_Consolidation_Reclass_ForecastMiddleYear_Centralization_Execute.log'],
          ['2018-06-24 11:58:49.7621','2018-06-24 11:59:02','ReportingAutomationBase','qaautomationrun2@hostanalytics.com','Ops_Planning','HYD-NTLYWEB02','D://Conference//TanentAppLog//06-24-2018//Reporting//TAPP_MAC2251.txt','D://Conference//AutomationLog//06-24-2018//ATMT10//HA.TestExecute.Reporting.SN_REP_CPM_21646.log'] 
          ]);        
                  

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
		
		</script>
				<div class="col-12 app-content"><br>
					<center>         
					<h2 class="main-title">Reconciled Error Report</h2><br>
						<div align="center" id="table_div" style="width: 1000px; height: 400px;"></div>
					</center>
				</div>
			</div>
		</div>
