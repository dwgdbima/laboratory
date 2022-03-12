
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				/* padding: 30px; */
				/* border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			/* .invoice-box table tr td:nth-child(2) {
				text-align: right;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			} */

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title" style="width: 90px">
									<img src="dist/user/images/logo.png" alt="Company logo" style="width: 100%; max-width: 80px" />
								</td>
                                <td style="text-align: left">
                                    <h4>Laboratorium UPN Veteran Yogyakarta<br>Jurusan Teknik Pertambangan</h3>
                                </td>
								<td style="text-align: right">
									<b>Invoice #{{ $order->order_id }}</b><br />
									<b>Tanggal:</b> {{ Carbon\Carbon::now()->format('d/m/Y') }}<br />
									<b>Jatuh Tempo:</b> {{ Carbon\Carbon::parse($order->payment_due)->format('d/m/Y') }}<br />
									<b>Status:</b> {{ $order->payment == 1 ? 'Dibayar' : 'Belum Dibayar'}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    Dari<br />
                                    <b>Admin, Lab.</b><br>
                                    <b>Email:</b> tedyagungc@upnyk.ac.id
								</td>

								<td style="text-align: left">
                                    Kepada<br>
                                    <b>{{ $order->name }}</b><br>
									<b>Email:</b> {{ $order->email }}<br>
                                    <b>No. Telp:</b> {{ $order->phone }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
            </table>
            <table>

				<tr class="heading">
					<td>Layanan</td>
                    <td>Satuan</td>
                    <td>Jumlah</td>
                    <td>Tanggal</td>
					<td>Harga</td>
				</tr>

				<tr class="item">
					<td>{{ $order->service->name }}</td>
                    <td>{{ $order->service->unit->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->service->unit->slug == 'per-hari' ? Carbon\Carbon::parse($order->start_date)->format('d/m/Y') . ' - ' . Carbon\Carbon::parse($order->end_date)->format('d/m/Y') : Carbon\Carbon::parse($order->date)->format('d/m/Y')}}</td>
					<td>{{ formatRupiah($order->price) }}</td>
				</tr>

				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>Total: {{ formatRupiah($order->price) }}</td>
				</tr>
			</table>
            <table>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<b>Metode Pembayaran</b><br />
									Bank BNI <b>0967433059</b><br />
                                    A.n. TEDY AGUNG CAHYADI
								</td>
							</tr>
						</table>
					</td>
				</tr>
            </table>
		</div>
	</body>
</html>
