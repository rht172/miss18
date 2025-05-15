function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function isNumericKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return true;
    return false;
}


//Notification Function
//position: 'right top'
function cznotify(titleMsg, bodyMsg, msgType = "success") {
    new Notify({
        title: titleMsg,
        text: bodyMsg,
        status: msgType,
        autotimeout: 3000
    })
}

function cznotifytimeout(titleMsg, bodyMsg, msgType = "success", time = 1500) {
    var notification = new Notify({
        title: titleMsg,
        text: bodyMsg,
        status: msgType
    });

    // Set a timeout to close the notification after 1 second (1000 milliseconds)
    setTimeout(function () {
        notification.close();
    }, time);
}

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};


function toggleAllCheckboxes(tableName) {
    $("#" + tableName + " input[type=checkbox]").each(function () {
        $(this).prop("checked", !$(this).prop("checked"));
    });
}

function toggleAllCheckbox() {
    $('#allcb').change(function () {
        $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
}

function getCheckedValuesForDelete(varTableName, varModalID, varURLPath, VarTableBodyID) {

    var table = document.getElementById(varTableName);
    var checkedValues = "";
    for (var i = 0, row; row = table.rows[i]; i++) {
        var checked = row.querySelectorAll("input:checked");
        if (checked.length === 1) {
            if (i == 0) {
                checkedValues = checked[0].value;

            } else {
                checkedValues = checkedValues + "," + checked[0].value;
            }
        }
    }
    $(varModalID).modal('hide');

    $(VarTableBodyID).html(
        '<br/><br/><div ><div class="spinner-border d-flex mx-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    );
    // console.log(checkedValues)
    var formData = {
        delete_key: checkedValues,
        delete_type: 'delete'
    }; //Array 

    $.ajax({
        url: varURLPath,
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            $(VarTableBodyID).html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}



function getCheckedValuesForAttach(varTableName, varURLPath, VarTableBodyID) {

    var table = document.getElementById(varTableName);
    var checkedValues = "";
    var j = 0;
    for (var i = 0, row; row = table.rows[i]; i++) {
        var checked = row.querySelectorAll("input:checked");
        console.log(checked);
        if (checked.length === 1) {
            if (j == 0) {
                checkedValues = checked[0].value;

            } else {
                checkedValues = checkedValues + "," + checked[0].value;
            }
            j = j + 1;
        }
    }

    // $(VarTableBodyID).html(
    //     '<br/><br/><div ><div class="spinner-border d-flex mx-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    // );
    // console.log(checkedValues)
    var formData = {
        update_key: checkedValues,
        delete_type: 'update'
    }; //Array 

    $.ajax({
        url: varURLPath,
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            $(VarTableBodyID).html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}



function getSingleValueFromDB(varURLPath, varTextBoxID) {
    var returnValue = "";
    $.ajax({
        url: varURLPath,
        type: "POST",
        data: "",
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            returnValue = data
            $(varTextBoxID).val(returnValue);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });

}


// function getValueFromDBandDisplay(varURLPath, ParaID) {
//     var returnValue = "";
//     $.ajax({
//         url: varURLPath,
//         type: "POST",
//         data: "",
//         success: function (data, textStatus, jqXHR) {
//             //data - response from server
//             returnValue = data
//             $(ParaID).innerHTML(returnValue);
//         },
//         error: function (jqXHR, textStatus, errorThrown) {

//         }
//     });

// }

function isValidDate(dateString) {
    var date = new Date(dateString);
    return !isNaN(date.getTime());
}
function toDateStringForMySQL(varIDDateFeild) {

    var date = $(varIDDateFeild).val()
    console.log(date);
    try {
        var dateObj = new Date(date);
        return dateObj.toISOString().substring(0, 10);
    } catch (error) {
        return "";
    }
}


function loadTableDataFromAjax(varTableBodyID, varURLPath, formData) {
    $(varTableBodyID).html(
        '<br/><br/><div ><div class="spinner-border d-flex mx-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    );
    $.ajax({
        url: varURLPath,
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            $(varTableBodyID).html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}


function downloadCSV(tableId, filename) {
    var csv = [];
    var rows = document.querySelectorAll("table#" + tableId + " tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download CSV file
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv.join("\n")], { type: "text/csv" });

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}



function downloadPDF(tableId, filename) {
    var pdf = new jsPDF('p', 'pt', 'letter');
    var source = document.getElementById(tableId).innerHTML;

    // We'll make our own renderer to skip this editor
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    margins = {
        top: 50,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
        source,
        margins.left,
        margins.top, {
        'width': margins.width,
        'elementHandlers': specialElementHandlers
    },

        function (dispose) {
            pdf.save(filename);
        }, margins);
}

function hideDatePicker(checkBoxID, datePickerDivID) {
    div2 = document.getElementById(datePickerDivID);
    if (document.getElementById(checkBoxID).checked) {
        div2.setAttribute("style", "display: block;");
    } else {
        div2.setAttribute("style", "display: none;");
    }
}





function getMySQLDateFromDatePicker(typeFromOrTo, datePickerString) {
    var returnDate = '';
    // Remove The Extra Space
    datePickerString = datePickerString.replace(" ", "");
    // Slipt The Two dates Based on the Key Word to

    var datePickerValue = datePickerString.split("to");
    // Get The Value Of From Or To Date
    if (typeFromOrTo == "from") {
        returnDate = datePickerValue[0];

    }
    else {
        returnDate = datePickerValue[1];
    }

    var dateParts = returnDate.split("-");
    var dateResult = dateParts[2] + "-" + dateParts[1] + '-' + dateParts[0]

    return dateResult.replace(" ", "");;

}


// function downloadExcel(varTableID, excelFileName) {
//     // Get the table element
//     var table = document.getElementById(varTableID);
//     // Create an empty Excel workbook
//     var wb = XLSX.utils.table_to_book(table);
//     // Get the binary data of the workbook
//     var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });
//     // Create a Blob with the binary data
//     var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });
//     // Create a link element to trigger the download
//     var link = document.createElement("a");
//     link.href = window.URL.createObjectURL(blob);
//     link.download = excelFileName + ".xlsx";
//     link.click();
// }

// function s2ab(s) {
//     var buf = new ArrayBuffer(s.length);
//     var view = new Uint8Array(buf);
//     for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
//     return buf;
// }




// function downloadExcel(varTableID, excelFileName) {
//     // Get the table element
//     var table = document.getElementById(varTableID);

//     // Create an empty Excel workbook from the table
//     var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

//     // Define the styles
//     var ws = wb.Sheets["Sheet1"];
//     var range = XLSX.utils.decode_range(ws['!ref']); // get the range of the sheet

//     // Style for the first row
//     var headerStyle = {
//         fill: {
//             fgColor: { rgb: "000000" } // Black background
//         },
//         font: {
//             color: { rgb: "FFFFFF" } // White text
//         }
//     };

//     // Apply styles to the first row
//     for (var C = range.s.c; C <= range.e.c; ++C) {
//         var cell_address = { c: C, r: 0 }; // 0 is the first row
//         var cell_ref = XLSX.utils.encode_cell(cell_address);

//         // If the cell exists, apply the style
//         if (ws[cell_ref]) {
//             ws[cell_ref].s = headerStyle;
//         }
//     }

//     // Write the workbook with the new styles
//     var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });

//     // Create a Blob with the binary data
//     var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });

//     // Create a link element to trigger the download
//     var link = document.createElement("a");
//     link.href = window.URL.createObjectURL(blob);
//     link.download = excelFileName + ".xlsx";
//     link.click();
// }

// // Function to convert workbook to binary
// function s2ab(s) {
//     var buf = new ArrayBuffer(s.length);
//     var view = new Uint8Array(buf);
//     for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
//     return buf;
// }



function preventFormSubmitOnEnter(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        // You can add any other actions you want to perform when Enter is pressed
        console.log('Enter pressed but form not submitted');
    }
}


function validatePhoneNumber() {
    const phoneNumberInput = document.getElementById('phoneNumberInput');
    const phoneNumberPattern = /^\d{10}$/;

    if (phoneNumberPattern.test(phoneNumberInput.value)) {
        phoneNumberInput.style.borderColor = 'green';
    } else {
        phoneNumberInput.style.borderColor = 'red';
    }
}




function downloadExcel(varTableID, excelFileName) {
    // Get the table element
    var table = document.getElementById(varTableID);

    // Create an Excel workbook from the table
    var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
    var ws = wb.Sheets["Sheet1"];

    // Set the widths for each column in the sheet
    var range = XLSX.utils.decode_range(ws['!ref']);
    ws['!cols'] = [];
    for (var C = range.s.c; C <= range.e.c; ++C) {
        ws['!cols'][C] = { wch: Math.max(...Array.from({ length: range.e.r + 1 }, (_, R) => (ws[XLSX.utils.encode_cell({ r: R, c: C })]?.v?.toString().length || 0) + 2)) };
    }

    // Write the workbook
    var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });

    // Create a Blob for the Excel file
    var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });

    // Create and trigger a download link
    var link = document.createElement("a");
    link.href = window.URL.createObjectURL(blob);
    link.download = excelFileName + ".xlsx";
    document.body.appendChild(link); // Required for Firefox
    link.click();
    document.body.removeChild(link); // Clean up
}

// Function to convert workbook to binary
function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
}







function formatDate(inputDate) {
    const date = new Date(inputDate);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}





function isNumber(value) {
    return typeof value === 'number';
}



function openNewTab(url) {
    window.open(url, '_blank');
}



$(document).ready(function () {
    $("#success-alert").hide();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(1);
    });
});



function getMultiValueFromDB(varURLPath, SelectBoxID) {
    var returnValue = "";

    $.ajax({
        url: varURLPath,
        type: "POST",
        // dataType: "json",        
        data: "",
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            var jsArray = JSON.parse(data);
            var option1 = "<option></option>";
            for (let i = 0; i < jsArray.length; i++) {
                option1 = option1 + "<option>" + jsArray[i] + "</option>";
            }
            $(SelectBoxID).html(option1);
        },

        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
    return returnValue
}


function block_imei_on_update() {
    // Get all the suggestags input areas and input elements
    var inputAreas = document.getElementsByClassName('amsify-suggestags-input-area');
    var inputs = document.getElementsByClassName('amsify-suggestags-input');

    // Loop through each input area and change the background color to grey
    for (var i = 0; i < inputAreas.length; i++) {
        inputAreas[i].style.backgroundColor = '#ccc'; // Grey color
    }

    // Loop through each suggestags input and make it readonly and change the background color to grey
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].setAttribute('readonly', true); // Make input readonly
        inputs[i].style.backgroundColor = '#ccc'; // Grey color
    }

    // Get all 'x' buttons and remove them from the DOM
    var removeTags = document.getElementsByClassName('amsify-remove-tag');
    while (removeTags.length > 0) {
        removeTags[0].parentNode.removeChild(removeTags[0]);
    }
}