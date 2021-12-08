import React from "react";
import { useState } from "react";
import { PostData } from "../../services/PostData";

import { Navigate } from "react-router-dom";

const Login = () => {
  //inputs should be passed to PostData (fetch)
  const [inputs, setInputs] = useState({});
  //setting response success status
  const [success, setSuccess] = useState(false);

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((values) => ({ ...values, [name]: value }));
  };

  const login = () => {
    PostData("login_register/login.php", inputs).then((result) => {
      let response = result;
      if (response.success === 1) {
        sessionStorage.setItem("token", JSON.stringify([response.token]));
        setSuccess(true);
      } else {
        window.alert(response.message);
      }
    });
  };

  if (success) {
    return <Navigate to={"/home"} />;
  }

  if (sessionStorage.getItem("token")) {
    return <Navigate to={"/home"} />;
  }

  return (
    <div>
      <div className="row ">
        <div className="medium-4 columns">
          <label>Username</label>
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
            value="Login"
            className="button"
            onClick={login}
          />
        </div>
        <div className="medium-8 columns"></div>
      </div>
    </div>
  );
};

export default Login;
