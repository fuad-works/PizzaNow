package com.svu.pizzanow;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.Gson;
import com.svu.pizzanow.Models.User;

import org.json.JSONException;
import org.json.JSONObject;

public class SignUpActivity extends AppCompatActivity {

    EditText txt_name,txt_phone_num,txt_email,txt_username, txt_password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        txt_name = findViewById(R.id.txt_name);
        txt_phone_num = findViewById(R.id.txt_phone);
        txt_email = findViewById(R.id.txt_email);
        txt_password = findViewById(R.id.txt_password);
        txt_username = findViewById(R.id.txt_user_name);
    }

    public void cancel(View v) {
        finish();
    }

    public void doSignUp(View v) throws JSONException {

        //check login and go to dashboard
        String username = txt_username.getText().toString();
        String password = txt_password.getText().toString();
        String name = txt_name.getText().toString();
        String phone = txt_phone_num.getText().toString();
        String email = txt_email.getText().toString();

        if (username.isEmpty() || password.isEmpty()) {
            Toast.makeText(this, "يرجى كتابة كامل المعلومات", Toast.LENGTH_LONG).show();
            return;
        } else {

            //do login

            ProgressDialog dialog = ProgressDialog.show(this, "تسجيل الدخول",
                    "يتم الآن تسجيل الدخول", true);

            dialog.show();

            RequestQueue queue = Volley.newRequestQueue(this);
            String url = getString(R.string.api_url) + "/";
            url += "register";

            User user = new User(1,username,password);
            user.setName(name);
            user.setPhone_num(phone);
            user.setEmail(email);
            String gson = new Gson().toJson(user);
            JSONObject data = new JSONObject(gson);

            JsonObjectRequest stringRequest = new JsonObjectRequest
                    (Request.Method.POST, url,data, new Response.Listener<JSONObject>(){

                        @Override
                        public void onResponse(JSONObject response) {

                            Gson gson = new Gson();
                            try {
                                if(response.getString("status") == "true")
                                {
                                    String token = response.getJSONObject("data").getString("token");
                                    int id = response.getJSONObject("data").getJSONObject("user").getInt("id");
                                    String name = response.getJSONObject("data").getJSONObject("user").getString("name");
                                    String mobile = response.getJSONObject("data").getJSONObject("user").getString("phone_num");
                                    int admin = response.getJSONObject("data").getJSONObject("user").getInt("user_type");
                                    String username = response.getJSONObject("data").getJSONObject("user").getString("username");
                                    String email = response.getJSONObject("data").getJSONObject("user").getString("email");

                                    SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
                                    SharedPreferences.Editor ed = prefs.edit();
                                    ed.putString("token", token);
                                    ed.putInt("id", id);
                                    ed.putString("name", name);
                                    ed.putInt("admin", admin);
                                    ed.putString("mobile", mobile);
                                    ed.putString("username", username);
                                    ed.putString("email", email);
                                    // ed.apply();
                                    ed.commit();

                                    Toast.makeText(getBaseContext(), "مرحباً بك: " + name , Toast.LENGTH_SHORT).show();

                                    finish();

                                }
                                else
                                    Toast.makeText(getBaseContext(), "خطأ باسم المستخدم أو كلمة المرور" , Toast.LENGTH_LONG).show();

                            } catch (JSONException e) {
                                e.printStackTrace();
                            }

                            dialog.dismiss();
                        }
                    }, new Response.ErrorListener() {

                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Intent i = new Intent(getBaseContext(),DashboardActivity.class);
                            startActivity(i);
                            Toast.makeText(getBaseContext(), "حصل خطأ بالإتصال", Toast.LENGTH_SHORT).show();
                            dialog.dismiss();
                        }
                    });
            queue.add(stringRequest);

        }
    }
}