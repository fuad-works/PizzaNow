package com.svu.pizzanow;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.Gson;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Product;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        LoadData();
    }

    private void LoadData() {
        //Get all products then go to dashboard
        RequestQueue queue = Volley.newRequestQueue(this);
        String url = getString(R.string.api_url) + "/";
        url += "get_products";

        JsonObjectRequest stringRequest = new JsonObjectRequest
                (Request.Method.GET, url,null, new Response.Listener<JSONObject>(){

                    @Override
                    public void onResponse(JSONObject response) {

                        Gson gson = new Gson();
                        List<Product> items = new ArrayList<>();

                        try {
                            JSONArray data = response.getJSONArray("data");


                            if(data.length () > 0){

                                for(int countItem = 0;countItem<data.length();countItem++){

                                    JSONObject bookingObject = data.getJSONObject(countItem);
                                    items.add(gson.fromJson(bookingObject.toString(), Product.class));

                                }

                            }

                            RoomDB roomDB = RoomDB.getInstance(getBaseContext());
                            roomDB.product_dao().clear_all(roomDB.product_dao().get_all());
                            roomDB.product_dao().add_all(items);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        Intent i = new Intent(getBaseContext(),DashboardActivity.class);
                        startActivity(i);
                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Intent i = new Intent(getBaseContext(),DashboardActivity.class);
                        startActivity(i);
                        Toast.makeText(getBaseContext(), "حصل خطأ بالإتصال", Toast.LENGTH_SHORT).show();
                    }
                });
        queue.add(stringRequest);

    }

}