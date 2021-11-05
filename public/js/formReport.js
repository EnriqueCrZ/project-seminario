$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let smartWizard = $('#smartwizard');
    smartWizard.smartWizard({
        selected: 0,
        theme: 'arrows',
        autoAdjustHeight:true,
        transitionEffect:'fade',
        showStepURLhash: false,
        enableURLhash: false,
        lang: {
            next: 'Siguiente',
            previous: 'Anterior'
        },
        keyboardSettings: {
            keyNavigation: true,
            keyLeft: [37],
            keyRight: [39]
        },
        anchorSettings: {
            markDoneStep: true,
            removeDoneStepOnNavigateBack: true,
            enableAnchorOnDoneStep: true
        }

    });
    smartWizard.on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
        console.log(currentStepIndex);
        if(currentStepIndex === 1){
            generateReport();
        }
    });

    let disableButton = {
        toolbarSettings: {
            showNextButton: false,
            showPreviousButton: false,
        }
    }

    function generateReport(){
        let ping = new Date;
        $('.sw-btn-next').attr('disabled',true);
        $('.sw-btn-prev').attr('disabled',true);
        setTimeout(function (){
            smartWizard.smartWizard("next");
        }, 2000);
    }

    $('#downloadButton').on("click",function (){
        let formData = {
            collection: $('#collection').val(),
            exportType: $('#exportType').val(),
        }


        window.open( "/admin/reportes/generate?" + $.param(formData),'_blank');
    })

    function resetWizard(){
        smartWizard.smartWizard("reset");
    }
