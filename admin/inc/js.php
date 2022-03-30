 <!-- Core -->
 <script src="../assets/dashboard/vendor/jquery/dist/jquery.min.js"></script>
 <script src="../assets/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <script src="../assets/dashboard/vendor/js-cookie/js.cookie.js"></script>
 <script src="../assets/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
 <script src="../assets/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
 <!-- Argon JS -->
 <script src="../assets/dashboard/js/argon.min5438.js?v=1.2.0"></script>

 <script src="../assets/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
 <script src="../assets/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
 <script>
 	$(document).ready(function() {
 		$('#myTable').DataTable({
 			dom: 'Bfrtip',
 			buttons: [
 				'excel', 'pdf', 'print'
 			]
 		});
 	});
 </script>

 </html>