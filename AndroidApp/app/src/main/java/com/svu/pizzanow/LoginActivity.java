package com.svu.pizzanow;

import androidx.annotation.Nullable;
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

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class LoginActivity extends AppCompatActivity {

    EditText txt_username, txt_password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        txt_username = findViewById(R.id.txt_user_name);
        txt_password = findViewById(R.id.txt_password);

        SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
        int user_id = prefs.getInt("user_id", 0);
        if (user_id > 0) {
            finish();
        }
    }

    @Override
    protected void onResume() {
        super.onResume();

        SharedPreferences prefs = getBaseContext().getSharedPreferences("prefs", Context.MODE_PRIVATE);
        int user_id = prefs.getInt("id", 0);
        if (user_id > 0) {
            finish();
        }
    }

    public void goSignUp(View v){
        Intent i = new Intent(this,SignUpActivity.class);
        startActivity(i);
    }

    public void cancel(View v) {
        finish();
    }

    public void dologin(View v) throws JSONException {

        //check login and go to dashboard
        String username = txt_username.getText().toString();
        String password = txt_password.getText().toString();

        if (username.isEmpty() || password.isEmpty()) {
            Toast.makeText(this, "يرجى كتابة اسم المستخدم وكلمة المرور", Toast.LENGTH_LONG).show();
            return;
        } else {

            //do login

            ProgressDialog dialog = ProgressDialog.show(this, "تسجيل الدخول",
                    "يتم الآن تسجيل الدخول", true);

            dialog.show();

            RequestQueue queue = Volley.newRequestQueue(this);
            String url = getString(R.string.api_url) + "/";
            url += "login";

            User user = new User(1,username,password);
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