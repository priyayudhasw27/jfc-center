$(document).ready(function() {
    countOnCart('#ticketOnCartDashboard');
    countUnpaidInvoice('#totalUnpaidInvoice');
    countWaitingInvoice('#totalWaitingInvoice');
    countPaidInvoice('#totalPaidInvoice');
    countBoughtTicket('#totalBoughtTicket');
    getBoughtTicket();
    checkExpired();
    checkKuotaAll();

    setInterval(function() {
        countOnCart('#ticketOnCartDashboard');
        countUnpaidInvoice('#totalUnpaidInvoice');
        countWaitingInvoice('#totalWaitingInvoice');
        countPaidInvoice('#totalPaidInvoice');
        countBoughtTicket('#totalBoughtTicket');
        getBoughtTicket();
        checkExpired();
        checkKuotaAll();
    }, 10000);
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




// function addToCart(idCategory) {
//     let selectedTicket = $('#subCategory' + idCategory + ' option:selected').val();
//     let nama = $('#namaPemesan').val();
//     let email = $('#emailPemesan').val();
//     let nomorHp = $('#nomorHpPemesan').val();

//     if (nama && nomorHp) {
//         $.ajax({
//             type: 'post',
//             url: '/Ticketing/Penonton/Ticket/AddToCart',
//             data: {
//                 selectedTicket: selectedTicket,
//                 nama: nama,
//                 email: email,
//                 nomorHp: nomorHp,
//             },
//             dataType: 'json',
//             success: function(data) {
//                 $('#buyTicketModal').modal('hide');
//                 // buyTicket();
//                 setTimeout(function() {
//                     countOnCart('#ticketOnCartDashboard');
//                     alert('Berhasil menambahkan ke keranjang.');
//                 }, 500)

//             },
//         })
//         alert('asdf')
//     } else {
//         alert('Harap lengkapi biodata pemilik ticket')
//     }
// }

function countOnCart(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountOnCart',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function openCart() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetCart',
        dataType: 'json',
        success: function(data) {
            // total price on cart
            let total = 0;
            $('#ticketsOnCart').empty();
            $.each(data, function(index, value) {
                total += parseInt(value.harga);
                $('#ticketsOnCart').append(
                    `
                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                               <div class="font-weight-bold text-primary text-uppercase mb-1">
                                   ` + value.nama_category + ` <span>` + value.nama_sub_category + `
                               </div>
                               <hr>
                               <div class="row no-gutters align-items-start">
                                    <div class="col mr-2">
                                        <div><strong>` + value.tanggal + `</strong></div>
                                        <div>` + value.start + ` - ` + value.end + `</div>
                                        <div class="mt-2 mb-2">` + value.location + `</div>
                                    </div>
                                    <div class ="col">
                                        <div><strong>` + value.nama + `</strong></div>
                                        <div>` + value.email + `</div>
                                        <div>` + value.no_hp + `</div>
                                        <div class="h4 text-primary mt-2"> Rp ` + value.harga + `</div>
                                    </div>
                                </div>
                                <button class=" btn btn-primary " onclick='deleteCart(` + value.id + `)'> <i class="fa fa-trash"></i> Hapus</button>
                            </div>
                        </div>
                    </div>
                    `
                )
            })

            uniqueCode = Math.floor(Math.random() * 100) + 100;
            finalTotal = (total + uniqueCode);
            $('#checkOutButton').html(`<button class="btn btn-primary" onclick="checkOut(` + finalTotal + `, ` + uniqueCode + `)"><i class="fa fa-shopping-cart"></i> Check Out</button>`)
            $('#priceOnCart').text(finalTotal);

        },
    })
    $('.modal').modal('hide');
    $('#cartModal').modal('show');
}

function deleteCart(id) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Penonton/Ticket/DeleteCart',
        data: {
            id_cart: id,
        },
        dataType: 'json',
        success: function(data) {
            $('#cartModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil menghapus item');
                countOnCart('#ticketOnCartDashboard');
                openCart();
            }, 500);

        }
    })
}

function checkOut(idCategory) {
    let selectedTicket = $('#subCategory' + idCategory + ' option:selected').val();
    let nama = $('#namaPemesan').val();
    let email = $('#emailPemesan').val();
    let nomorHp = $('#nomorHpPemesan').val();

    if (nama && nomorHp) {
        if (selectedTicket) {
            $.ajax({
                type: 'post',
                url: '/Ticketing/Penonton/Ticket/CheckOut',
                data: {
                    id_ticket_sub: selectedTicket,
                    nama: nama,
                    email: email,
                    no_hp: nomorHp,
                },
                dataType: 'json',
                success: function(data) {
                    countOnCart('#ticketOnCartDashboard');
                    openInvoiceDetail(data);
                }
            })
            alert('Berhasil')
        } else {
            alert('Ticket tidak terpilih. Pilih tiket atau refresh browser')
        }
    } else {
        alert('Harap lengkapi biodata pemilik ticket')
    }

}

function countUnpaidInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'unpaid',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function countWaitingInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'waiting',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function countPaidInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'verified',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function openInvoice() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetInvoice',
        dataType: 'json',
        success: function(data) {
            $('#invoiceTableData').empty()
            $.each(data, function(index, value) {
                let status;
                if (value.status == 'unpaid') {
                    status = `<p class="text-danger">Unpaid <i class="fa fa-times"></i></p>`
                } else if (value.status == 'waiting') {
                    status = `<p class="text-info">Waiting <i class="fa fa-history"></i></p>`
                } else if (value.status == 'verified') {
                    status = `<p class="text-success">Verified <i class="fa fa-check"></i></p>`
                } else if (value.status == 'expired') {
                    status = `<p class="text-secondary">Expired <i class="fa fa-times"></i></p>`
                }
                $('#invoiceTableData').append(
                    `
                <tr>
                    <td>` + value.id + `</td>
                    <td>` + value.created_at + `</td>
                    <td>` + value.username + `</td>
                    <td>Rp ` + value.total + `</td>
                    <td>
                        ` + status + `
                    </td>
                    <td><button class="btn btn-primary" onclick="openInvoiceDetail(` + value.id + `)">Detail</button></td>
                </tr>
                `
                )
            })
        }
    })
    $('#invoiceModal').modal('show');
}

function openInvoiceDetail(id_invoice) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Penonton/Ticket/GetInvoiceDetail',
        data: {
            id_invoice: id_invoice,
        },
        dataType: 'json',
        success: function(data) {
            let expiredDate = new Date(data.invoice.expired_date).toLocaleDateString('id-ID', fullDateOpt)
            let invoiceDate = new Date(data.invoice.created_at).toLocaleDateString('id-ID', onlyDateOpt)
            $('#ticket_bought_invoice').empty();
            $('#id_invoice').text(data.invoice.id);
            $('#username_invoice').text(data.invoice.username);
            $('#tanggal_invoice').text(invoiceDate);
            $('#expired_date').text(expiredDate);

            let status;
            if (data.invoice.status == 'unpaid') {
                status = `<p class="text-danger">Unpaid <i class="fa fa-times"></i></p>`
            } else if (data.invoice.status == 'waiting') {
                status = `<p class="text-info">Waiting <i class="fa fa-history"></i></p>`
            } else if (data.invoice.status == 'verified') {
                status = `<p class="text-success">Verified <i class="fa fa-check"></i></p>`
            } else if (data.invoice.status == 'expired') {
                status = `<p class="text-danger">Expired <i class="fa fa-times"></i></p>`
            }

            $('#status_invoice').html(status);

            if (data.invoice.status == 'unpaid') {
                $('#uploadPaymentButton').attr('disabled', false)
            } else {
                $('#uploadPaymentButton').attr('disabled', true)
            }

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

            $('#totalPriceInvoice').text('Rp ' + data.invoice.total);
        }
    })

    $('.modal').modal('hide');
    $('#invoiceDetailModal').modal('show');
}

function uploadPembayaran() {
    let id_invoice = $('#id_invoice').text();
    $('#invoiceId').val(id_invoice);
    $('.modal').modal('hide');
    $('#uploadPembayaranModal').modal('show');
    checkStatusTicket(id_invoice);
}

function detailTicket(id_ticket_bought) {
    $('.modal').modal('hide');

    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetBoughtTicketDetail',
        data: {
            id_ticket_bought: id_ticket_bought,
        },
        dataType: 'json',
        success: function(data) {
            let tanggal = new Date(data.tanggal).toLocaleDateString('id-ID', onlyDateOpt);
            $('#ticketBoughtDetail').html(
                `
                <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                               <div class="font-weight-bold text-primary text-uppercase mb-1">
                                   ` + data.nama_category + ` <span>` + data.nama_sub_category + `
                               </div>
                               <hr>
                               <div class="row no-gutters align-items-start">
                                    <div class="col mr-2">
                                        <div><strong>` + tanggal + `</strong></div>
                                        <div>` + data.start + ` - ` + data.end + `</div>
                                        <div class="mt-2 mb-2 text-success">` + data.location + `</div>
                                        <div class="mt-2 mb-2"><a href="` + data.location_link + `">Lihat lokasi di map</a></div>
                                        <div class="mt-2 mb-2 text-success">Blok ` + data.blok + `</div>
                                    </div>
                                    <div class ="col">
                                        <div><strong>` + data.nama + `</strong></div>
                                        <div>` + data.email + `</div>
                                        <div>` + data.no_hp + `</div>
                                        <div class="mt-2"><img src="` + data.bar_code + `"></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="button" data-dismiss="modal" aria-label="Close">Tutup</button>
                            </div>
                        </div>
                    </div>
                `
            );
        }
    })

    $('#ticketDetailModal').modal('show');
}

function getBoughtTicket() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetBoughtTicket',
        dataType: 'json',
        success: function(data) {
            $('#myTicket').empty();
            $.each(data, function(index, value) {
                $('#myTicket').append(
                    `
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-primary text-uppercase mb-1">
                                            ` + value.nama_category + ` <p>` + value.nama_sub_category + `</p>
                                        </div>
                                        <hr>
                                        <div class="mb-0 font-weight-bold text-gray-800">` + value.nama + `</div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                Email : <div class="text-success font-weight-bold">` + value.email + `</div>
                                            </div>
                                            <div class="col">
                                                No. HP : <div class="text-danger font-weight-bold">` + value.no_hp + `</div>
                                            </div>
                                        </div>
                                        <button class=" btn btn-primary" onclick='detailTicket(` + value.id + `)'>Lihat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                );
            })
        }
    })
}

function countBoughtTicket(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountBoughtTicket',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        }
    })
}




// the fucking ticket buyer

// let selectedSeatId;
// let selectedSeatName = '';

function selectLocation() {
    $('#selectLocationModal').modal('show');
}

function buyTicket() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetCategories',
        dataType: 'json',
        success: function(data) {
            $('#tickets').empty()
                // let selectedSeat = selected_seat ? selected_seat : '';

            $.each(data, function(index, value) {
                let date = new Date(value.tanggal).toLocaleDateString("id-ID", onlyDateOpt)

                $('#tickets').append(
                    `
                    <div class="col-lg-12 col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                ` + value.nama + `
                                            </div>
                                            <hr>
                                            <div><strong>` + date + `</strong></div>
                                            <div>` + value.start + ` - ` + value.end + `</div>
                                            <div class="mt-2 mb-2">` + value.location + `</div>
                                            <div class="form-group">
                                                <label for=""><strong>Pilih Jenis Tiket</strong></label>
                                                <select class="form-control" name="" id="subCategory` + value.id + `">
                                                </select>
                                            </div>
                                            <button id="beliButton` + value.id + `" class=" btn btn-primary" onclick='checkOut(` + value.id + `)'> <i class="fa fa-cart-plus"></i> Beli</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                )
            })
        }
    })
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetSubCategories',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, value) {
                checkKuota(value.id).done(function(kuota) {
                    kuota > 0 ?

                        $('#subCategory' + value.id_ticket_category).append(
                            `
                    <option value=` + value.id + `>` + value.nama + ` Harga Rp` + value.harga + `</option>
                    `
                        )

                    :

                    $('#beliButton' + value.id_ticket_category).attr('disabled', true).html('Kuota Habis');
                })
            })
        }
    })

    $('.modal').modal('hide');
    setTimeout(function() {
        $('#buyTicketModal').modal('show');
    }, 200);
}

function checkKuota(id_sub_category) {
    return $.getJSON('/Ticketing/Admin/Ticket/CheckKuota', { id_sub_category: id_sub_category })
        .done(function(response) {
            a = response
                // console.log(a);
                // return a
        })
}



function closeBuyTicket() {
    $('#buyTicketModal').modal('hide');
}

function checkStatusTicket(id_invoice) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CheckStatusTicket',
        data: {
            id_invoice: id_invoice,
        },
        dataType: 'json',
        success: function(data) {
            if (data == 'expired') {
                $('.modal').modal('hide');
                alert('Maaf invoice sudah Expired');
            }
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