$(document).ready(function() {

    // paid ticket datatables
    $('#paidTicketTable').DataTable();
    $('#needVerificationTable').DataTable();
    getTotalCategories();
    getWaitingInvoice();
    countUnpaidInvoice('#unpaidInvoices');
    countTicketBought('#boughtTicket');
    countTicketInVenue('#totalTicketInVenue');
    checkExpired();
    checkKuotaAll();
    setInterval(function() {
        countUnpaidInvoice('#unpaidInvoices');
        countTicketBought('#boughtTicket');
        countTicketInVenue('#totalTicketInVenue');
        checkExpired();
        checkKuotaAll();
        getWaitingInvoice();
    }, 10000);
    setInterval("window.location.reload()", 1800000);
})

let fullDateOpt = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
let onlyDateOpt = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

function checkExpired() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CheckExpired',
        dataType: 'json',
        success: function(data) {},
    })
}


function getTotalCategories() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CountCategories',
        dataType: 'json',
        success: function(data) {
            $('#totalTicketCategories').text(data);
        }
    })
}

function storeCategory() {
    let nama = $('#nama_kategori').val()
    let tanggal = $('#tanggal').val()
    let start = $('#start').val()
    let end = $('#end').val()
    let kuota = $('#kuota').val()
    let location = $('#location option:selected').val()
    let address = $('#address').val()
    let locationLink = $('#location_link').val()

    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/StoreCategory',
        data: {
            nama: nama,
            tanggal: tanggal,
            start: start,
            end: end,
            kuota: kuota,
            location: location,
            address: address,
            location_link: locationLink,

        },
        dataType: 'json',
        success: function(data) {
            $('#addTicketCategoryModal').modal('hide');
            openTicketCategory();
            alert('Berhasil');
        }
    })
}

function storeSubCategory() {
    let id_category = $('#id_category option:selected').val();
    let nama = $('#nama_sub_kategori').val();
    let harga = $('#harga').val();

    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/StoreSubCategory',
        data: {
            id_category: id_category,
            nama: nama,
            harga: harga,
        },
        dataType: 'json',
        success: function(data) {
            $('#addTicketSubCategoryModal').modal('hide');
            openTicketCategory();
            alert('Berhasil');
        }
    })
}

function openPaidTicket() {
    $('#paidTicketModal').modal('show');
}

function openTicketCategory() {
    $('#tickets').empty();
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetCategories',
        data: {},
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, value) {
                let date = new Date(value.tanggal).toLocaleDateString('id-ID', onlyDateOpt)
                $('#tickets').append(
                    `
                        <div class="row mb-2">
                            <div class="col" id="">
                                <strong>` + value.nama + `</strong> <button class="ml-2 btn btn-sm btn-danger" onclick="deleteCategory(` + value.id + `)"><i class="fa fa-trash"></i></button>
                                <div>` + date + `</div>
                                <div>` + value.start + ` - ` + value.end + `</div>
                                <div>` + value.kuota + ` Seat</div>
                                <div class="text-success">` + value.location + `</div>
                                <div><a href="` + value.location_link + `">Link Map Lokasi</a></div>
                            </div>
                            <div class="col" id="subCategory` + value.id + `">
                            </div>
                        </div>
                        <hr>
                            `
                )
            })
        }
    })

    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetSubCategories',
        data: {},
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, value) {
                $('#subCategory' + value.id_ticket_category).append(
                    `
                            <div class="row mb-2">
                                    <div class="col">` + value.nama + `</div>
                                    <div class="col">Rp ` + value.harga + `</div>
                                    <button class="ml-2 btn btn-sm btn-danger" onclick="deleteSubCategory(` + value.id + `)"><i class="fa fa-trash"></i>
                                </div>
                            `
                )
            })
        }
    })


    $('#ticketCategoryModal').modal('show');
}

function openAddTicketCategory() {
    $('#nama_kategori').empty();
    $('#ticketCategoryModal').modal('hide');
    $('#addTicketCategoryModal').modal('show');
}

function openAddTicketSubCategory() {
    $('#nama_sub_kategori').empty();
    $('#harga').empty();
    $('#ticketCategoryModal').modal('hide');

    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/GetCategories',
        dataType: 'json',
        success: function(data) {
            $('#id_category').empty();
            $.each(data, function(index, value) {
                $('#id_category').append('<option value="' + value.id + '">' + value.nama + ' | ' + value.location + '</option>');
            })
        }
    })
    $('#addTicketSubCategoryModal').modal('show');
}

function openPortal() {
    $('#asyu').val('');
    $('#portalModal').modal('show');
    setTimeout(function() {
        $('#asyu').focus();
    }, 200)
}

function openInvoice(idInvoice) {
    $('#invoiceModal').modal('show');
}

function openInvoiceDetail(id_invoice) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/GetInvoiceDetail',
        data: {
            id_invoice: id_invoice,
        },
        dataType: 'json',
        success: function(data) {
            let date = new Date(data.invoice.created_at).toLocaleDateString('id-ID', onlyDateOpt)
            $('#ticket_bought_invoice').empty();
            $('#id_invoice').text(data.invoice.id);
            data.invoice.status == 'verified' ? $('#id_invoice').html('<i class="ml-2 fa fa-check text-success"> verified</i>') : $('#id_invoice').html('');
            $('#username_invoice').text(data.invoice.username);
            $('#tanggal_invoice').text(date);

            $.each(data.detail, function(index, value) {
                $('#ticket_bought_invoice').append(
                    `
                    <div class="row justify-content-between">
                        <div class="col">
                            <div>
                            ` + value.nama_pemilik + `
                            </div>
                            <div class="row">
                                <div class="col">
                                ` + value.nama_category + ` - ` + value.nama + `
                                </div>
                            </div>
                        </div>
                        <div class="col">Rp ` + value.harga + `</div>
                    </div>
                    `
                );
            })

            $('#paymentImage').html(`<img style='width: 100%' src='/assets/payment/` + data.invoice.id + `.jpg'>`)

            $('#totalPriceInvoice').text('Rp ' + data.invoice.total);

            data.invoice.status == 'waiting' ? $('#confirmPaymentButton').html(`<button class="btn btn-success" type="button" onclick="confirmPayment(` + data.invoice.id + `)"> <i class="fa fa-check"></i> Konfirmasi Pembayaran</button>`) : $('#confirmPaymentButton').html(`<button class="btn btn-danger" type="button" onclick="revokePayment(` + data.invoice.id + `)"> <i class="fa fa-undo"></i> Batalkan Pembayaran</button>`)
        }
    })

    $('.modal').modal('hide');
    $('#invoiceDetailModal').modal('show');
}

function confirmPayment(id_invoice) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/ConfirmPayment',
        data: {
            id_invoice: id_invoice
        },
        dataType: 'json',
        success: function(data) {
            $('#invoiceDetailModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil');
                openInvoiceDetail(id_invoice)
                getWaitingInvoice();
                countUnpaidInvoice('#unpaidInvoices');
                countTicketBought('#boughtTicket');
            }, 500)
        }
    })
}

function revokePayment(id_invoice) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/RevokePayment',
        data: {
            id_invoice: id_invoice
        },
        dataType: 'json',
        success: function(data) {
            $('#invoiceDetailModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil');
                openInvoiceDetail(id_invoice)
                getWaitingInvoice();
                countUnpaidInvoice('#unpaidInvoices');
                countTicketBought('#boughtTicket');
            }, 500)
        }
    })
}

function getWaitingInvoice() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetWaitingInvoice',
        dataType: 'json',
        success: function(data) {
            $('#invoiceTableTitle').html(`Waiting Verification <i class="fa fa-history"></i>`)
            $('#invoiceTableData').empty()
            $.each(data, function(index, value) {
                let date = new Date(value.created_at).toLocaleDateString('id-ID', onlyDateOpt)
                $('#invoiceTableData').append(
                    `
                <tr>
                <td>` + (index + 1) + `</td>
                    <td>` + value.id + `</td>
                    <td>` + date + `</td>
                    <td>` + value.username + `</td>
                    <td>` + value.nama_lengkap + `</td>
                    <td>Rp ` + value.total + `</td>
                    <td><button class="btn btn-primary" onclick="openInvoiceDetail(` + value.id + `)">Detail</button></td>
                </tr>
                `
                )
            })
        }
    })
}

function openUnpaidInvoice() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetUnpaidInvoice',
        dataType: 'json',
        success: function(data) {
            $('#unpaidInvoiceData').empty();
            $.each(data, function(index, value) {
                let date = new Date(value.created_at).toLocaleDateString('id-ID', onlyDateOpt)
                $('#unpaidInvoiceData').append(
                    `
                <tr>
                    <td>` + value.id + `</td>
                    <td>` + date + `</td>
                    <td>` + value.username + `</td>
                    <td>Rp ` + value.total + `</td>
                    <td><button class="btn btn-primary" onclick="openInvoiceDetail(` + value.id + `)">Detail</button></td>
                </tr>
                `
                )
            })
            $('#unpaidInvoiceTable').DataTable();
            $('#unpaidInvoiceModal').modal('show');
        }
    })
}

function getVerifiedInvoice() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetVerifiedInvoice',
        dataType: 'json',
        success: function(data) {
            $('#invoiceTableTitle').html(`Verified Ticket <i class="text-success fa fa-check"></i>`)
            $('#invoiceTableData').empty()
            $.each(data, function(index, value) {
                $('#invoiceTableData').append(
                    `
                <tr>
                    <td>` + value.id + `</td>
                    <td>` + value.created_at + `</td>
                    <td>` + value.username + `</td>
                    <td>Rp ` + value.total + `</td>
                    <td><button class="btn btn-primary" onclick="openInvoiceDetail(` + value.id + `)">Detail</button></td>
                </tr>
                `
                )
            })
        }
    })
}

function countUnpaidInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CountUnpaidInvoice',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        }
    })
}

function countTicketBought(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CountBoughtTicket',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        }
    })
}



function deleteCategory(id) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/DeleteCategory',
        data: {
            id_ticket_category: id,
        },
        dataType: 'json',
        success: function(data) {
            $('#ticketCategoryModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil');
                openTicketCategory();
                getTotalCategories();
            }, 500);
        }
    })
}

function deleteSubCategory(id) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/DeleteSubCategory',
        data: {
            id_ticket_sub: id,
        },
        dataType: 'json',
        success: function(data) {
            $('#ticketCategoryModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil');
                openTicketCategory();
                getTotalCategories();
            }, 500);
        }
    })
}

function checkKuotaAll() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CheckKuotaAll',
        dataType: 'json',
        success: function(data) {
            $('#sisaKuota').empty()
            $.each(data, function(index, value) {
                $('#sisaKuota').append(
                    `<div class="row mb-0 font-weight-bold text-gray-800""><div class="col-lg-8 col-6 col-md-7">` + value.nama_category + `</div><div class="col"><span class="text-primary">` + value.sisa_kuota + `</span></div></div>`
                );
            })
        }
    })
}

$('#portal_form').submit(function(e) {
    e.preventDefault()
})