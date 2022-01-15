package com.svu.pizzanow;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
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
import com.svu.pizzanow.Adapters.ProductAdapter;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.OrderDetails;
import com.svu.pizzanow.Models.Product;
import com.svu.pizzanow.Models.User;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class CartActivity extends AppCompatActivity {

    TextView txt_total;
    RecyclerView rv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        txt_total = findViewById(R.id.txt_total);
        rv = findViewById(R.id.rv);

        LoadData();
    }

    private void LoadData() {
        //Post Order Logic here
        RoomDB roomDB = RoomDB.getInstance(this);
        List<Cart> items = roomDB.cart_dao().get_all();

        int total = 0;
        for(int i=0;i<items.size();i++)
        {
            Product p = roomDB.product_dao().get_by_id(items.get(i).getProduct_id());
            total += p.getPrice();
        }

        txt_total.setText("الإجمالي: " + total + " ل.س");

        CartAdapter adapter = new CartAdapter(this, new CartAdapter.OnItemClickListener() {


            @SuppressLint("NotifyDataSetChanged")
            @Override
            public void onItemBtn(Cart item) {

                roomDB.cart_dao().delete(item);
                LoadData();

            }

        },items);

        rv.setAdapter(adapter);

        RecyclerView.LayoutManager layoutManager;

        layoutManager = new GridLayoutManager(getBaseContext(), 1);

        rv.setLayoutManager(layoutManager);
    }

    Context context = this;
    public void postOrder(View v) throws JSONException{

        ProgressDialog dialog = ProgressDialog.show(this, "تسجيل الدخول",
                "يتم الآن تسجيل الدخول", true);

        dialog.show();

        RequestQueue queue = Volley.newRequestQueue(this);
        String url = getString(R.string.api_url) + "/";
        url += "order";

        Order order = new Order();
        order.setUser_id(1);
        ArrayList<OrderDetails> details = new ArrayList<>();

        RoomDB roomDB = RoomDB.getInstance(this);
        List<Cart> items = roomDB.cart_dao().get_all();

        for(int i=0;i<items.size();i++)
        {
            Cart crt = items.get(i);
            OrderDetails detail = new OrderDetails();
            detail.setCustomize(crt.getCustomize());
            detail.setQuantity(1);
            detail.setProduct_id(crt.getProduct_id());
            details.add(detail);
        }

        order.setDetails(details);

        String gson = new Gson().toJson(order);
        JSONObject data = new JSONObject(gson);

        //Toast.makeText(this, gson, Toast.LENGTH_LONG).show();

        SharedPreferences prefs = context.getSharedPreferences("prefs", Context.MODE_PRIVATE);
        String token = prefs.getString("token","");
        //Toast.makeText(this, token, Toast.LENGTH_SHORT).show();

        JsonObjectRequest stringRequest = new JsonObjectRequest
                (Request.Method.POST, url,data, new Response.Listener<JSONObject>(){

                    @Override
                    public void onResponse(JSONObject response) {

                        Gson gson = new Gson();
                        try {
                            if(response.getString("status") == "true")
                            {
                                Toast.makeText(context, "تم إرسال الطلب بنجاح", Toast.LENGTH_LONG).show();

                                roomDB.cart_dao().clear();

                                finish();

                            }
                            else
                                Toast.makeText(getBaseContext(), "لم يتم ارسال الطلب" , Toast.LENGTH_LONG).show();

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        dialog.dismiss();
                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getBaseContext(), "حصل خطأ بالإتصال" + error.getMessage(), Toast.LENGTH_SHORT).show();
                        dialog.dismiss();
                    }
                }){
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String, String>  params = new HashMap<String, String>();
                params.put("Authorization", "Bearer " + token);
                return params;
            }
        };
        queue.add(stringRequest);

    }

}