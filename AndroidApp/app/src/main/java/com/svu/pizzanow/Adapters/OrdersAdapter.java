package com.svu.pizzanow.Adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;
import com.svu.pizzanow.DataBase.RoomDB;
import com.svu.pizzanow.Models.Order;
import com.svu.pizzanow.Models.OrderDetails;
import com.svu.pizzanow.Models.Product;
import com.svu.pizzanow.R;

import java.util.List;

public class OrdersAdapter extends RecyclerView.Adapter<OrdersAdapter.ViewHolderIndex>{

    private Context context;
    private List<Order> items;
    private final OrdersAdapter.OnItemClickListener listener;

    public interface OnItemClickListener {
        void onItemBtn(Order item);
    }

    public OrdersAdapter(Context context, OrdersAdapter.OnItemClickListener listener, List<Order> items) {
        this.context = context;
        this.items = items;
        this.listener = listener;
    }

    @NonNull
    @Override
    public OrdersAdapter.ViewHolderIndex onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View myViewInflater = LayoutInflater.from(context).inflate(R.layout.item_order, parent, false);
        return new OrdersAdapter.ViewHolderIndex(myViewInflater);
    }

    @Override
    public void onBindViewHolder(@NonNull OrdersAdapter.ViewHolderIndex holder, int position) {

        Order item = items.get(position);


        holder.item = item;
        holder.txt_name.setText("الطلبية " + item.getId());
        String status = "طلب جديد";
        switch (item.getStatus())
        {
            case 2:
                status = "قيد التوصيل";
                break;
            case 3:
                status = "منفذ";
                break;
            case 4:
                status = "ملغي";
                break;
        }
        holder.txt_desc.setText("حالة الطلب: " + status);

        int total_price = 0;

        List<OrderDetails> details = item.getDetails();
        RoomDB roomDB = RoomDB.getInstance(context);
        for(int i=0;i<details.size();i++)
        {
            Product p = roomDB.product_dao().get_by_id(details.get(i).getProduct_id());
            total_price += p.getPrice();
        }
        holder.txt_price.setText("اجمالي الطلبية: " + total_price + " ل.س");


        holder.bind(item,listener);
    }

    @Override
    public int getItemCount() {
        return items.size();
    }


    public class ViewHolderIndex extends RecyclerView.ViewHolder {

        Order item;

        TextView txt_name,txt_desc,txt_price;

        public ViewHolderIndex(View itemView) {
            super(itemView);
            txt_name = itemView.findViewById(R.id.txt_name);
            txt_desc = itemView.findViewById(R.id.txt_desc);
            txt_price = itemView.findViewById(R.id.txt_price);

        }

        public void bind(final Order item, final OrdersAdapter.OnItemClickListener listener) {


        }

    }
}
