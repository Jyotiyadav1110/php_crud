


function addEducationField() {
    var wrapper = document.getElementById("education_fields");
    var field = document.createElement("div");
    field.innerHTML = '<input type="text" name="education[]" placeholder="Education" required>' +
        '<input type="text" name="year_of_completion[]" placeholder="Year of Completion" required>' +
        '<button type="button" onclick="removeEducationField(this)">Remove</button>';
    wrapper.appendChild(field);
}

function removeEducationField(element) {
    element.parentNode.remove();
}

function showHideFields() {
    var salariedFields = document.getElementById("salaried_fields");
    var selfEmployedFields = document.getElementById("self_employed_fields");
    var profession = document.querySelector('input[name="profession"]:checked').value;

    if (profession === "Salaried") {
        salariedFields.style.display = "block";
        selfEmployedFields.style.display = "none";
    } else if (profession === "Self-employed") {
        salariedFields.style.display = "none";
        selfEmployedFields.style.display = "block";
    }
}

// City data for each state
// City data for each state
var cityData = {
    "Andhra Pradesh": ["Visakhapatnam", "Vijayawada", "Guntur", "Nellore", "Kurnool", "Rajahmundry", "Tirupati", "Kakinada", "Kadapa", "Anantapur", "Chittoor", "Amalapuram"],
    "Arunachal Pradesh": ["Itanagar", "Naharlagun", "Tawang", "Pasighat", "Roing", "Ziro", "Along", "Tezu", "Bomdila", "Daporijo", "Namsai", "Seppa"],
    "Assam": ["Guwahati", "Silchar", "Dibrugarh", "Jorhat", "Nagaon", "Tinsukia", "Tezpur", "Bongaigaon", "Karimganj", "Dhubri", "Sivasagar", "Goalpara"],
    "Bihar": ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur", "Purnia", "Darbhanga", "Bihar Sharif", "Arrah", "Begusarai", "Katihar", "Munger", "Chhapra"],
    "Chhattisgarh": ["Raipur", "Bhilai", "Bilaspur", "Korba", "Durg", "Raigarh", "Rajnandgaon", "Jagdalpur", "Ambikapur", "Dhamtari", "Mahasamund", "Chirmiri"],
    "Goa": ["Panaji", "Vasco da Gama", "Margao", "Mapusa", "Ponda", "Bicholim", "Curchorem", "Sanquelim", "Valpoi", "Cuncolim", "Sanguem", "Quepem"],
    "Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar", "Jamnagar", "Junagadh", "Gandhinagar", "Nadiad", "Mehsana", "Anand", "Bharuch"],
    "Haryana": ["Faridabad", "Gurgaon", "Panipat", "Ambala", "Yamunanagar", "Rohtak", "Hisar", "Karnal", "Sonipat", "Panchkula", "Bhiwani", "Sirsa"],
    "Himachal Pradesh": ["Shimla", "Solan", "Dharamsala", "Kullu", "Manali", "Mandi", "Palampur", "Una", "Nahan", "Bilaspur", "Chamba", "Hamirpur"],
    "Jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad", "Bokaro Steel City", "Deoghar", "Phusro", "Hazaribagh", "Giridih", "Ramgarh", "Jhumri Tilaiya", "Saunda", "Chandrapura"],
    "Karnataka": ["Bangalore", "Mysore", "Hubli-Dharwad", "Mangalore", "Belgaum", "Gulbarga", "Davanagere", "Bellary", "Bijapur", "Shimoga", "Tumkur", "Raichur"],
    "Kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode", "Thrissur", "Kollam", "Palakkad", "Alappuzha", "Kannur", "Kottayam", "Manjeri", "Kasaragod", "Pathanamthitta"],
    "Madhya Pradesh": ["Indore", "Bhopal", "Jabalpur", "Gwalior", "Ujjain", "Sagar", "Dewas", "Satna", "Ratlam", "Rewa", "Chhindwara", "Shivpuri"],
    "Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik", "Thane", "Aurangabad", "Solapur", "Bhiwandi", "Amravati", "Malegaon", "Kolhapur", "Nanded"],
    "Manipur": ["Imphal", "Thoubal", "Bishnupur", "Churachandpur", "Kakching", "Senapati", "Ukhrul", "Jiribam", "Kangpokpi", "Tamenglong", "Chandel"],
    "Meghalaya": ["Shillong", "Tura", "Nongpoh", "Jowai", "Nongstoin", "Baghmara", "Williamnagar", "Resubelpara", "Mairang", "Cherrapunji", "Khliehriat"],
    "Mizoram": ["Aizawl", "Lunglei", "Saiha", "Champhai", "Kolasib", "Serchhip", "Lawngtlai", "Hnahthial", "Biate", "Vairengte", "Sairang", "Thenzawl"],
    "Nagaland": ["Kohima", "Dimapur", "Mokokchung", "Tuensang", "Wokha", "Zunheboto", "Phek", "Chumukedima", "Mon", "Kiphire", "Tizit", "Longleng"],
    "Odisha": ["Bhubaneswar", "Cuttack", "Rourkela", "Brahmapur", "Sambalpur", "Puri", "Balasore", "Bhadrak", "Baripada", "Jharsuguda", "Bargarh", "Jeypore"],
    "Punjab": ["Ludhiana", "Amritsar", "Jalandhar", "Patiala", "Bathinda", "Hoshiarpur", "Mohali", "Batala", "Pathankot", "Moga", "Abohar", "Firozpur"],
    "Rajasthan": ["Jaipur", "Jodhpur", "Kota", "Bikaner", "Ajmer", "Udaipur", "Bhilwara", "Alwar", "Bharatpur", "Sri Ganganagar", "Sikar", "Pali"],
    "Sikkim": ["Gangtok", "Namchi", "Gyalshing", "Mangan", "Singtam", "Rangpo", "Jorethang", "Ravangla", "Naya Bazar", "Mangan", "Rhenock", "Gyalshing"],
    "Tamil Nadu": ["Chennai", "Coimbatore", "Madurai", "Tiruchirappalli", "Salem", "Tirunelveli", "Tiruppur", "Vellore", "Thoothukudi", "Thanjavur", "Kanyakumari", "Dindigul"],
    "Telangana": ["Hyderabad", "Warangal", "Nizamabad", "Karimnagar", "Ramagundam", "Khammam", "Mahbubnagar", "Nalgonda", "Adilabad", "Suryapet", "Miryalaguda", "Jagtial"],
    "Tripura": ["Agartala", "Dharmanagar", "Udaipur", "Belonia", "Ambassa", "Kailasahar", "Khowai", "Sonamura", "Kamalpur", "Sabroom", "Amarpur", "Jirania"],
    "Uttar Pradesh": [
        "Lucknow", "Kanpur", "Ghaziabad", "Agra", "Meerut", "Varanasi", 
        "Allahabad", "Bareilly", "Aligarh", "Moradabad", "Saharanpur", "Gorakhpur",
        "Noida", "Firozabad", "Jhansi", "Muzaffarnagar", "Mathura", "Budaun", 
        "Rampur", "Shahjahanpur", "Hapur", "Farrukhabad", "Etawah", "Mirzapur",
        "Bulandshahr", "Sambhal", "Amroha", "Hardoi", "Fatehpur", "Raebareli",
        "Orai", "Sitapur", "Bahraich", "Modinagar", "Unnao", "Jaunpur",
        "Lakhimpur", "Prayagraj", "Gonda", "Barabanki", "Etah", "Azamgarh",
        "Basti", "Firozabad", "Faizabad", "Hathras", "Ambedkar Nagar", "Deoria",
        "Moradabad", "Sultanpur", "Bijnor", "Mainpuri", "Chandausi", "Badaun",
        "Bareilly", "Mau", "Hardoi", "Amroha", "Pilibhit", "Shahjahanpur",
        "Sitapur", "Ujhani", "Jaunpur", "Lakhimpur Kheri", "Ghazipur", "Sultanpur",
        "Azamgarh", "Fatehpur", "Barabanki", "Kasganj", "Sambhal", "Greater Noida",
        "Shikohabad", "Shamli", "Rae Bareli", "Hapur", "Bulandshahr", "Chandausi",
        "Jhansi", "Mughalsarai", "Banda", "Etawah", "Mirzapur", "Rampur", 
        "Lalitpur", "Muzaffarnagar", "Tanda", "Shahabad", "Sahaswan", "Rath",
        "Gajraula", "Hardoi", "Renukoot", "Faridpur", "Sambhal", "Tanda",
        "Rae Bareli", "Pilkhuwa", "Shahabad", "Rudauli", "Soron", "Noorpur",
        "Parasi", "Laharpur", "Shamsabad", "Sirsaganj", "Pilkhuwa", "Shahabad",
        "Sandi", "Sirsi", "Pihani", "Siana", "Kanpur", "Ghaziabad", "Agra", 
        "Meerut", "Varanasi", "Allahabad", "Bareilly", "Aligarh", "Moradabad",
        "Saharanpur", "Gorakhpur", "Noida", "Firozabad", "Jhansi", "Muzaffarnagar",
        "Mathura", "Budaun", "Rampur", "Shahjahanpur", "Hapur", "Farrukhabad",
        "Etawah", "Mirzapur", "Bulandshahr", "Sambhal", "Amroha", "Hardoi", 
        "Fatehpur", "Raebareli", "Orai", "Sitapur", "Bahraich", "Modinagar",
        "Unnao", "Jaunpur", "Lakhimpur", "Prayagraj", "Gonda", "Barabanki",
        "Etah", "Azamgarh", "Basti", "Firozabad", "Faizabad", "Hathras", 
        "Ambedkar Nagar", "Deoria", "Moradabad", "Sultanpur", "Bijnor", "Mainpuri",
        "Chandausi", "Badaun", "Bareilly", "Mau", "Hardoi", "Amroha", "Pilibhit",
        "Shahjahanpur", "Sitapur", "Ujhani", "Jaunpur", "Lakhimpur Kheri", "Ghazipur",
        "Sultanpur", "Azamgarh", "Fatehpur", "Barabanki", "Kasganj", "Sambhal",
        "Greater Noida", "Shikohabad", "Shamli", "Rae Bareli", "Hapur", 
        "Bulandshahr", "Chandausi", "Jhansi", "Mughalsarai", "Banda", "Etawah",
        "Mirzapur", "Rampur", "Lalitpur", "Muzaffarnagar", "Tanda", "Shahabad",
        "Sahaswan", "Rath", "Gajraula", "Hardoi", "Renukoot", "Faridpur",
        "Sambhal", "Tanda", "Rae Bareli", "Pilkhuwa", "Shahabad", "Rudauli",
        "Soron", "Noorpur", "Parasi", "Laharpur", "Shamsabad", "Sirsaganj",
        "Pilkhuwa", "Shahabad", "Sandi", "Sirsi", "Pihani", "Siana"
    ],
        "Uttarakhand": ["Dehradun", "Haridwar", "Roorkee", "Haldwani", "Rudrapur", "Kashipur", "Rishikesh", "Pithoragarh", "Ramnagar", "Kotdwara", "Manglaur", "Mussoorie"],
    "West Bengal": ["Kolkata", "Howrah", "Asansol", "Siliguri", "Durgapur", "Bardhaman", "Malda", "Baharampur", "Habra", "Kharagpur", "Shantipur", "Dankuni"],
    "Andaman and Nicobar Islands": ["Port Blair", "Bamboo Flat", "Garacharma", "Prothrapur", "Teylerabad", "Alipur"],
    "Chandigarh": ["Chandigarh"],
    "Dadra and Nagar Haveli": ["Silvassa", "Amli", "Dadra"],
    "Daman and Diu": ["Daman", "Diu"],
    "Lakshadweep": ["Kavaratti", "Agatti", "Androth", "Minicoy", "Kalpeni", "Amini"],
    "Delhi": ["New Delhi", "Ghaziabad", "Noida", "Faridabad", "Gurgaon", "Meerut", "Sonipat", "Panipat", "Karnal", "Rohtak", "Hisar", "Bahadurgarh"],
    "Puducherry": ["Puducherry", "Karaikal", "Mahe", "Yanam"],
};



// Function to populate cities based on selected state
function populateCities(state) {
    var citySelect = document.getElementById("city");
    citySelect.innerHTML = '<option value="">Select City</option>';

    var cities = cityData[state] || [];
    cities.forEach(function (city) {
        var option = document.createElement("option");
        option.value = city;
        option.text = city;
        citySelect.appendChild(option);
    });
}

// Event listener for state dropdown change
document.getElementById("state").addEventListener("change", function () {
    var state = this.value;
    populateCities(state);
});