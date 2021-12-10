import React from "react";
import { Navigate } from "react-router-dom";



const Welcome = () => {
  if (sessionStorage.getItem("token")) {
    return <Navigate to={"/home"} />;
  }
  return (
    <div>
      <div className="row">
        <h2> WILKOMMEN !</h2>
        <a href = "/login" className = "button primary">Login</a>
        <a href = "/Signup" className = "button secondary">Register</a>
      </div>
    </div>
  );
};

export default Welcome;
