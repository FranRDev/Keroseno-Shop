<!-- JavaScript -->
    <script src="res/jquery/jquery.min.js"></script>
    <script src="res/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="res/jquery-easing/jquery.easing.min.js"></script>
    <script src="res/js/sb-admin.min.js"></script>
    <script src="res/js/sb-admin-datatables.min.js"></script>

    <!-- IE10 truco de viewport para error en Surface/escritorio Windows 8 -->
    <script>
        (function() {
            'use strict'

            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement('style')
                msViewportStyle.appendChild(
                    document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                    )
                )
                document.head.appendChild(msViewportStyle)
            }
        }())
    </script>