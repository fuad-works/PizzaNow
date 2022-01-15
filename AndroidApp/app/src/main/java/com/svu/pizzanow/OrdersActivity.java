package com.svu.pizzanow;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.Gson;
import com.svu.pizzanow.Adapters.CartAdapter;
import com.svu.pizzanow.Adapters.OrdersAdapter;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.Product;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class OrdersActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_orders);
        
        LoadData();
    }
    ArrayList<Order> my_orders = new ArrayList<>();

    Context context = this;
    private void LoadData() {
        ArrayList<Order> my_orders = new ArrayList<>();

        SharedPreferences prefs = context.getSharedPreferences("prefs", Context.MODE_PRIVATE);
        String token = prefs.getString("token","");

        RequestQueue queue = Volley.newRequestQueue(this);
        String url = getString(R.string.api_url) + "/";
        url += "my_orders";

        JsonObjectRequest stringRequest = new JsonObjectRequest
                (Request.Method.GET, url,null, new Response.Listener<JSONObject>(){

                    @Override
                    public void onResponse(JSONObject response) {

                        Gson gson = new Gson();
                        List<Order> items = new ArrayList<>();

                        try {
                            JSONArray data = response.getJSONArray("data");

                            if(data.length () > 0){

                                for(int countItem = 0;countItem<data.length();countItem++){

                                    JSONObject bookingObject = data.getJSONObject(countItem);
                                    items.add(gson.fromJson(bookingObject.toString(), Order.class));

                                }

                            }

                            RoomDB roomDB = RoomDB.getInstance(getBaseContext());
                            roomDB.order_dao().clear_all(roomDB.order_dao().get_all());
                            roomDB.order_dao().add_all(items);

                            OrdersAdapter adapter = new OrdersAdapter(context, new OrdersAdapter.OnItemClickListener() {


                                @Override
                                public void onItemBtn(Order item) {

                                }
                            },items);

                            RecyclerView rv = findViewById(R.id.rv);

                            rv.setAdapter(adapter);

                            RecyclerView.LayoutManager layoutManager;

                            layoutManager = new GridLayoutManager(getBaseContext(), 1);

                            rv.setLayoutManager(layoutManager);


                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getBaseContext(), "حصل خطأ بالإتصال", Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String, String>  params = new HashMap<String, String>();
                params.put("Authorization", "Bearer " + token);
                return params;
            }
        }
        ;
        queue.add(stringRequest);



    }



    public void cancel(View v) {
        finish();
    }


}