$(document).ready(function() {

    // paid ticket datatables
    $('#paidTicketTable').DataTable();
    $('#needVerificationTable').DataTable();
    getTotalCategories();
    getWaitingInvoice();
    countUnpaidInvoice('#unpaidInvoices');
    countTicketBought('#boughtTicket');
    countTicketInVenue('#totalTicketInVenue')
})

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
    let location = $('#location').val()
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
                $('#tickets').append(
                    `
                        <div class="row mb-2">
                            <div class="col" id="">
                                <strong>` + value.nama + `</strong> <button class="ml-2 btn btn-sm btn-danger" onclick="deleteCategory(` + value.id + `)"><i class="fa fa-trash"></i></button>
                                <div>` + value.tanggal + `</div>
                                <div>` + value.start + ` - ` + value.end + `</div>
                                <div>` + value.kuota + ` Seat</div>
                                <div>` + value.location + `</div>
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
                $('#id_category').append('<option value="' + value.id + '">' + value.nama + '</option>');
            })
        }
    })
    $('#addTicketSubCategoryModal').modal('show');
}

function openPortal() {
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
            $('#ticket_bought_invoice').empty();
            $('#id_invoice').text(data.invoice.id);
            data.invoice.status == 'verified' ? $('#id_invoice').html('<i class="ml-2 fa fa-check text-success"> verified</i>') : $('#id_invoice').html('');
            $('#username_invoice').text(data.invoice.username);
            $('#tanggal_invoice').text(data.invoice.created_at);

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

$('#asyu').keyup(function() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/GetBoughtTicketDetail',
        data: {
            id_ticket_bought: $('#asyu').val(),
        },
        dataType: 'json',
        success: function(data) {
            let inVenueText
            let statusText
            if (data.status == 'unpaid') {
                statusText = `<div class="text-danger"><i class="fa fa-times"></i>Ticket Unpaid</div>`
            } else if (data.status == 'waiting') {
                statusText = `<div class="text-info"><i class="fa fa-history"></i> Waiting Payment</div>`
            } else if (data.status == 'verified') {
                statusText = `<div class="text-success"><i class="fa fa-check"></i> Ticket Verified!</div>`
            }

            data.in_venue == 'yes' ? inVenueText = `<div class="text-danger"><i class="fa fa-times"></i> Sudah Check In</div>` : inVenueText = '';

            $('#ticketBoughtDetailPortal').html(
                `
                <div class="text-center"><img src="` + data.bar_code + `"></div>
                <hr>
                <div class="text-center">
                    <strong>` + data.nama_category + ` - ` + data.nama_sub_category + `</strong>
                    <h4>` + data.nama + `</h4>
                    ` + statusText + `
                    ` + inVenueText + `
                </div>
                `
            );
        }
    })
})

function checkIn() {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Admin/Ticket/CheckIn',
        data: {
            id_ticket_bought: $('#asyu').val(),
        },
        dataType: 'json',
        success: function(data) {
            $('#asyu').val('');
            $('#asyu').focus();
            countTicketInVenue('#totalTicketInVenue')
        }
    })
}

function countTicketInVenue(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Admin/Ticket/CountTicketInVenue',
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