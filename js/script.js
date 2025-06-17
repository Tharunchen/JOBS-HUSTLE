// Show job details
function showJobDetails(jobTitle) {
    document.getElementById('jobs').style.display = 'none';
    document.getElementById('job-details').style.display = 'block';
  
    let jobInfo = '';
    switch(jobTitle) {
      case 'Software Engineer':
        jobInfo = `
          <h3>Software Engineer</h3>
          <p>Location: San Francisco, CA</p>
          <p>Experience: 3+ years</p>
          <p>Responsibilities: Develop, test, and deploy software solutions.</p>
          <p>Requirements: Experience in JavaScript, Python, or C++.</p>
        `;
        break;
      case 'Data Scientist':
        jobInfo = `
          <h3>Data Scientist</h3>
          <p>Location: New York, NY</p>
          <p>Experience: 2+ years</p>
          <p>Responsibilities: Analyze data and build predictive models.</p>
          <p>Requirements: Experience with Python, R, and SQL.</p>
        `;
        break;
    }
  
    document.getElementById('job-info').innerHTML = jobInfo;
  }
  
  // Hide job details and return to job listings
  function hideJobDetails() {
    document.getElementById('jobs').style.display = 'block';
    document.getElementById('job-details').style.display = 'none';
  }
  
  // Handle form submission
  function submitApplication(event) {
    event.preventDefault();
  
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const position = document.getElementById('position').value;
    const resume = document.getElementById('resume').files[0].name;
  
    alert(`Application submitted!\nName: ${name}\nEmail: ${email}\nPosition: ${position}\nResume: ${resume}`);
  }
  