import React from "react";
import { useState } from "react";
import { Navigate } from "react-router";
import { PostData } from "../../services/PostData";
const Footer = () => {
  //inputs should be passed to PostData (fetch)
  const [inputs, setInputs] = useState({});
  //setting response success status
  const [success, setSuccess] = useState(false);

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((values) => ({ ...values, [name]: value }));
  };

  const signup = () => {
    PostData("login_register/register.php", inputs).then((result) => {
      console.log(JSON.stringify(inputs));
      let response = result;
      if (response.success === 1) {
        setSuccess(true);
        window.alert("Signup Complete");
      } else {
        window.alert(response.message);
      }
    });
  };
  

  if (success) {
    return <Navigate to={"/"} />;
  }

  if (sessionStorage.getItem("token")) {
    return <Navigate to={"/"} />;
  }

  return (
    <div>
      <div className="row">
        <div className="medium-6 columns">
          <input
            type="text"
            name="firstName"
            placeholder="firstName"
            value={inputs.firstName || ""}
            onChange={handleChange}
          />
          <input
            type="text"
            name="secondName"
            placeholder="secondName"
            value={inputs.secondName || ""}
            onChange={handleChange}
          />
          <input
            type="text"
            name="email"
            placeholder="email"
            value={inputs.email || ""}
            onChange={handleChange}
          />
          <input
            type="text"
            name="password"
            placeholder="password"
            value={inputs.password || ""}
            onChange={handleChange}
          />
          <input
            type="submit"
            value="Signup"
            className="button"
            onClick={signup}
          />
        </div>
        <div className="medium-8 columns"></div>
      </div>
    </div>
  );
};

export default Footer;
